<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderSection;
use App\Models\SurveyPhoto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->role == 'admin') {
                $orders = Order::with('user')->orderBy('invoice', 'asc')->get(['id', 'invoice', 'user_id', 'location', 'order_date']);
            } else {
                $orders = Order::with('user')->orderBy('invoice', 'asc')->where('user_id', Auth::user()->id)->get(['id', 'invoice', 'user_id', 'location', 'order_date']);
            }
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $avatarUrl = empty($data->user->avatar)
                        ? asset('storage/avatar/user-avatar.png')
                        : asset('storage/avatar/' . $data->user->avatar);

                    return '
                        <a href="customers-view.html" class="hstack gap-3">
                            <div class="avatar-image avatar-md">
                                <img src="' . $avatarUrl . '" alt="" class="img-fluid">
                            </div>
                            <div>
                                <span class="text-truncate-1-line">' . htmlspecialchars($data->user->first_name . ' ' . $data->user->last_name, ENT_QUOTES, 'UTF-8') . '</span>
                            </div>
                        </a>';
                })
                ->addColumn('order_date', function ($data) {
                    return Carbon::parse($data->order_date)->locale('id')->isoFormat('dddd, D MMMM YYYY');
                })
                ->addColumn('action', function ($data) {
                    $action = '';

                    if (Auth::user()->role == 'admin') {
                        $action = '<li>
                                        <a href="' . route('order.detail', $data->invoice) . '" class="dropdown-item">
                                            <i class="feather feather-eye me-3"></i>
                                            <span>Detail</span>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" id="btnEdit" data-id="' . $data->id . '">
                                            <i class="feather feather-edit-3 me-3"></i>
                                            <span>Edit</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" id="btnDelete" data-id="' . $data->id . '">
                                            <i class="feather feather-trash-2 me-3"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </li>';
                    } else {
                        $action = '<li>
                                        <a href="' . route('order.detail', $data->invoice) . '" class="dropdown-item">
                                            <i class="feather feather-eye me-3"></i>
                                            <span>Detail</span>
                                        </a>
                                    </li>';
                    }
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    ' . $action . '
                                </ul>
                            </div>
                        </div>';
                })
                ->rawColumns(['name', 'status', 'action'])
                ->make(true);
        }
        $users = User::where('role', 'customer')->orderBy('first_name', 'asc')->get();
        return view('backend.orders.index', compact('users'));
    }

    public function detail($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $user = User::find($order->user_id);
        $orderSections = OrderSection::where('order_id', $order->id)->orderBy('created_at', 'asc')->get();

        $completedTasks = collect([
            $order->status_survey,
            $order->status_design,
            $order->status_approval,
            $order->status_production,
            $order->status_instalation,
        ])->filter(function ($status) {
            return $status == 1;
        })->count();

        $totalTasks = 5;
        $progressPercentage = ($completedTasks / $totalTasks) * 100;
        return view('backend.orders.detail', compact('order', 'completedTasks', 'progressPercentage', 'user', 'orderSections'));
    }

    public function edit($id)
    {
        $data = Order::find($id);
        return response()->json($data);
    }

    public function store_order(Request $request)
    {
        $id = $request->id;

        $rules = [
            'user_id' => 'required',
            'location' => 'required',
        ];

        if (!$id) {
            $rules['order_date'] = 'required';
        }

        $messages = [
            'user_id.required' => 'Silakan isi pelanggan terlebih dahulu.',
            'location.required' => 'Silakan isi lokasi terlebih dahulu.',
            'order_date.required' => 'Silakan isi tanggal terlebih dahulu.',
        ];

        $validated = Validator::make($request->all(), $rules, $messages);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $orderData = [
                    'invoice' => $id ? Order::find($id)->invoice : $this->generateTransactionCode(),
                    'user_id' => $request->user_id,
                    'location' => $request->location,
                ];

                if (!$id) {
                    $orderData['order_date'] = $request->order_date;
                }

                $order = Order::updateOrCreate(
                    ['id' => $id],
                    $orderData
                );


                return response()->json(['order' => $order, 'message' => 'Data berhasil disimpan.']);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Oppss',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function destroy(Request $request)
    {
        $order = Order::findOrFail($request->id);
        if ($order->initial_payment) {
            $photoPath = storage_path("app/private/uploads/initial_payment/{$order->initial_payment}");

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $surveyPhotos = $order->survey_photos;
        foreach ($surveyPhotos as $photo) {
            $photoPath = storage_path("app/private/uploads/survey/{$photo->photo_name}");

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $designPhotos = $order->design_photos;
        foreach ($designPhotos as $photo) {
            $photoPath = storage_path("app/private/uploads/design/{$photo->photo_design}");

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        $order->survey_photos()->delete();
        $order->design_photos()->delete();
        $order->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    private function generateTransactionCode()
    {
        $prefix = 'NGP';
        $date = now()->format('Ymd');
        $lastOrder = Order::where('invoice', 'like', $prefix . $date . '%')->latest()->first();
        $lastCode = $lastOrder ? substr($lastOrder->invoice, -4) : '0000';
        $nextCode = str_pad(intval($lastCode) + 1, 4, '0', STR_PAD_LEFT);
        return $prefix . $date . $nextCode;
    }

    public function store_survey(Request $request)
    {
        $rules = [
            'initial_payment' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
        ];

        if (Auth::user()->role == 'admin') {
            $rules['detail_survey'] = 'required';
        }

        $validated = Validator::make(
            $request->all(),
            $rules,
            [
                'detail_survey.required' => 'Silakan isi detail terlebih dahulu.',
                'initial_payment.image' => 'File harus berupa gambar.',
                'initial_payment.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'initial_payment.file' => 'File harus berupa gambar.',
                'initial_payment.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $order = Order::find($request->id);
                if (Auth::user()->role == 'admin') {
                    $order->detail_survey = $request->detail_survey;
                }

                if ($request->hasFile('initial_payment')) {
                    $photo = $request->file('initial_payment');
                    $photoName = time() . '_initial_payment_' . $photo->getClientOriginalName();
                    Storage::putFileAs('uploads/initial_payment', $photo, $photoName);
                    $order->initial_payment = $photoName;
                }

                if ($request->status_survey == '') {
                    $order->status_survey = 0;
                } else {
                    $order->status_survey = $request->status_survey;
                }

                $order->save();

                return response()->json(['success' => 'Data berhasil disimpan']);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Oppss, error...',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function store_image_survey(Request $request)
    {
        $order = Order::find($request->id_order);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = $order->invoice . '_survey_' . uniqid() . '_' . $file->getClientOriginalName();
            $uploadPath = 'uploads/survey';
            Storage::putFileAs($uploadPath, $file, $imageName);

            $surveyPhoto = SurveyPhoto::create([
                'photo_name' => $imageName,
                'order_id' => $request->id_order
            ]);

            return response()->json([
                'message' => 'Design berhasil diupload!',
                'id' => $surveyPhoto->id,
                'photo_name' =>  $imageName,
            ]);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function destroy_image_survey(Request $request)
    {
        try {
            $survey_photo = SurveyPhoto::find($request->id);
            if ($survey_photo) {
                if ($survey_photo->photo_name) {
                    Storage::disk('private')->delete('uploads/survey/' . $survey_photo->photo_name);
                }

                $survey_photo->delete();
                return response()->json(['message' => 'Data berhasil dihapus']);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store_section(Request $request)
    {
        $id_section = $request->id_section;
        $validated = Validator::make(
            $request->all(),
            [
                'name_section' => 'required|unique:order_sections,section_title,' . $id_section,
            ],
            [
                'name_section.required' => 'Silakan isi nama bagian terlebih dahulu.',
                'name_section.unique' => 'Bagian sudah tersedia.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $orderSection = OrderSection::updateOrCreate([
                    'id' => $id_section
                ], [
                    'order_id' => $request->id_order,
                    'section_title' => $request->name_section,
                    'note' => $request->note_section,
                ]);

                return response()->json(['orderSection' => $orderSection, 'message' => 'Data berhasil disimpan.']);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Opps...',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function edit_section($id)
    {
        $data = OrderSection::find($id);
        return response()->json($data);
    }

    public function destroy_section(Request $request)
    {
        $orderSection = OrderSection::find($request->id);

        if ($orderSection) {
            $orderSection->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderSection;
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
            $orders = Order::with('user')->orderBy('invoice', 'asc')->get(['id', 'invoice', 'user_id', 'location', 'order_date']);
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
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
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
                                    </li>
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
        $validated = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'location' => 'required',
                'order_date' => 'required',
            ],
            [
                'user_id.required' => 'Silakan isi pelanggan terlebih dahulu.',
                'location.required' => 'Silakan isi lokasi terlebih dahulu.',
                'order_date.required' => 'Silakan isi tanggal terlebih dahulu.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $order = Order::updateOrCreate([
                    'id' => $id
                ], [
                    'user_id' => $request->user_id,
                    'location' => $request->location,
                    'location' => $request->location,
                    'order_date' => $request->order_date,
                ]);

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
        $surveyPhotos = $order->survey_photos;
        foreach ($surveyPhotos as $photo) {
            $photoPath = storage_path("app/private/uploads/survey/{$photo->photo_name}");

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        $order->survey_photos()->delete();
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
        $validated = Validator::make(
            $request->all(),
            [
                'survey_photo' => 'required|max:5120',
                'survey_photo.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'detail_survey' => 'required',

            ],
            [
                'survey_photo.required' => 'Silakan isi foto terlebih dahulu.',
                'survey_photo.image' => 'File harus berupa gambar.',
                'survey_photo.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'survey_photo.file' => 'File harus berupa gambar.',
                'survey_photo.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
                'detail_survey.required' => 'Silakan isi detail terlebih dahulu.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $order = Order::find($request->id);
                $order->detail_survey = $request->detail_survey;
                $order->status_survey = 1;
                $order->save();

                if ($request->hasFile('survey_photo')) {
                    foreach ($request->file('survey_photo') as $image) {
                        $imageName =  time() . '_survey_' . $image->getClientOriginalName();
                        Storage::putFileAs('uploads/survey', $image, $imageName);
                        $order->survey_photos()->create(['photo_name' => $imageName]);
                    }
                }

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

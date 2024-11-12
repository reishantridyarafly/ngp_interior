<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
            $orders = Order::with('user')->OrderBy('order_date', 'desc')->get(['invoice', 'user_id', 'location', 'order_date']);
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
        return view('backend.orders.detail', compact('order', 'completedTasks', 'progressPercentage', 'user'));
    }

    public function store_order(Request $request)
    {
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
                $order = new Order();
                $order->invoice = $this->generateTransactionCode();
                $order->user_id = $request->user_id;
                $order->location = $request->location;
                $order->order_date = $request->order_date;
                $order->save();

                return response()->json(['success' => 'Data berhasil disimpan']);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Oppss',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
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

    private function generateTransactionCode()
    {
        $prefix = 'NGP';
        $date = now()->format('Ymd');

        $lastOrder = Order::latest()->first();
        $lastCode = $lastOrder ? substr($lastOrder->code, -4) : '0000';
        $nextCode = str_pad(intval($lastCode) + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $date . $nextCode;
    }
}

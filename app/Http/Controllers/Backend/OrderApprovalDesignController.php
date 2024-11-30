<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SendProgressEmail;
use App\Models\Order;
use App\Models\WorkingPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderApprovalDesignController extends Controller
{
    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'fifty_percent_payment' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
            ],
            [
                'fifty_percent_payment.image' => 'File harus berupa gambar.',
                'fifty_percent_payment.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'fifty_percent_payment.file' => 'File harus berupa gambar.',
                'fifty_percent_payment.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $order = Order::find($request->id_order);
                $order->revision = $request->revision;

                if ($request->hasFile('fifty_percent_payment')) {
                    $photo = $request->file('fifty_percent_payment');
                    $photoName = time() . '_fifty_percent_payment_' . $photo->getClientOriginalName();
                    Storage::putFileAs('uploads/fifty_percent_payment', $photo, $photoName);
                    $order->fifty_percent_payment = $photoName;
                }

                if ($request->status_approval == '') {
                    $order->status_approval = 0;
                } else {
                    $order->status_approval = $request->status_approval;

                    if ($request->status_approval == 1) {
                        $data = [
                            'subject' => 'Konfirmasi Pemesanan - Persetujuan',
                            'name' => $order->user->first_name,
                            'status_name' => 'status persetujuan',
                            'view' => 'email.progress_approve'
                        ];
                        Mail::to($order->user->email)->send(new SendProgressEmail($data));
                    } elseif ($request->status_approval == 2) {
                        $data = [
                            'subject' => 'Konfirmasi Pemesanan - Persetujuan',
                            'name' => $order->user->first_name,
                            'status_name' => 'status persetujuan',
                            'view' => 'email.progress_reject'
                        ];
                        Mail::to($order->user->email)->send(new SendProgressEmail($data));
                    }
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

    public function store_photos(Request $request)
    {
        $order = Order::find($request->id_order);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = $order->invoice . '_working_' . uniqid() . '_' . $file->getClientOriginalName();
            $uploadPath = 'uploads/working';
            Storage::putFileAs($uploadPath, $file, $imageName);

            $workingPicture = WorkingPicture::create([
                'photo_working' => $imageName,
                'order_id' => $request->id_order
            ]);

            return response()->json([
                'message' => 'Design berhasil diupload!',
                'id' => $workingPicture->id,
                'photo_working' =>  $imageName,
            ]);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $working_picture = WorkingPicture::find($request->id);
            if ($working_picture) {
                if ($working_picture->photo_name) {
                    Storage::disk('private')->delete('uploads/working/' . $working_picture->photo_name);
                }

                $working_picture->delete();
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
}

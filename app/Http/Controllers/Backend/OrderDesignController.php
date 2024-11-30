<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SendProgressEmail;
use App\Models\Order;
use App\Models\OrderDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderDesignController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::find($request->id_order);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = $order->invoice . '_design_' . uniqid() . '_' . $file->getClientOriginalName();
            $uploadPath = 'uploads/design';
            Storage::putFileAs($uploadPath, $file, $imageName);

            $orderDesign = OrderDesign::create([
                'photo_design' => $imageName,
                'order_id' => $request->id_order
            ]);

            return response()->json([
                'message' => 'Design berhasil diupload!',
                'id' => $orderDesign->id,
                'photo_design' =>  $imageName,
            ]);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function store_revision(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'revision' => 'required'
            ],
            [
                'revision.required' => 'Revisi tidak boleh kosong.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $order = Order::find($request->id_order);
                $order->revision = $request->revision;

                if ($request->hasFile('ten_percent_payment')) {
                    $photo = $request->file('ten_percent_payment');
                    $photoName = time() . '_ten_percent_payment_' . $photo->getClientOriginalName();
                    Storage::putFileAs('uploads/ten_percent_payment', $photo, $photoName);
                    $order->ten_percent_payment = $photoName;
                }

                if ($request->status_design == '') {
                    $order->status_design = 0;
                } else {
                    $order->status_design = $request->status_design;

                    if ($request->status_design == 1) {
                        $data = [
                            'subject' => 'Konfirmasi Pemesanan - Design',
                            'name' => $order->user->first_name,
                            'status_name' => 'status design',
                            'view' => 'email.progress_approve'
                        ];
                        Mail::to($order->user->email)->send(new SendProgressEmail($data));
                    } elseif ($request->status_design == 2) {
                        $data = [
                            'subject' => 'Konfirmasi Pemesanan - Design',
                            'name' => $order->user->first_name,
                            'status_name' => 'status design',
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

    public function destroy(Request $request)
    {
        try {
            $design = OrderDesign::find($request->id);
            if ($design) {
                if ($design->photo_design) {
                    Storage::disk('private')->delete('uploads/design/' . $design->photo_design);
                }

                $design->delete();
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

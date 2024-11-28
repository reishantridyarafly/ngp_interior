<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderInstallationController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::find($request->id);
        $rules = [
            'last_payment' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
        ];

        if ($order->last_payment == null) {
            $rules['last_payment'] = 'required';
        }

        $validated = Validator::make(
            $request->all(),
            $rules,
            [
                'last_payment.required' => 'Silakan isi bukti terlebih dahulu.',
                'last_payment.image' => 'File harus berupa gambar.',
                'last_payment.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'last_payment.file' => 'File harus berupa gambar.',
                'last_payment.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                if ($request->hasFile('last_payment')) {
                    $photo = $request->file('last_payment');
                    $photoName = time() . '_last_payment_' . $photo->getClientOriginalName();
                    Storage::putFileAs('uploads/last_payment', $photo, $photoName);
                    $order->last_payment = $photoName;
                }

                if ($request->status_installation == '') {
                    $order->status_installation = 0;
                } else {
                    $order->status_installation = $request->status_installation;
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
}

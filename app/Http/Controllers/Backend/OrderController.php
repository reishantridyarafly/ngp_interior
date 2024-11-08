<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function survey($id)
    {
        $user = User::find($id);
        $order = Order::where('user_id', $user->id)->first();

        $completedTasks = collect([
            $order->status_survey,
            $order->status_design,
            $order->status_approval,
            $order->status_production,
            $order->status_instalation,
        ])->filter(function ($status) {
            return $status == 1;
        })->count();

        $totalTasks = 5; // Total jumlah tugas
        $progressPercentage = ($completedTasks / $totalTasks) * 100;
        return view('backend.order.index', compact('user', 'completedTasks', 'progressPercentage'));
    }

    public function survey_store(Request $request, $id)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'location' => 'required',
                'order_date' => 'required',
                'survey_photo' => 'required|max:5120',
                'survey_photo.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'detail_survey' => 'required',

            ],
            [
                'location.required' => 'Silakan isi lokasi terlebih dahulu.',
                'order_date.required' => 'Silakan isi tanggal terlebih dahulu.',
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
                $order = new Order();
                $order->user_id = $request->id_user;
                $order->location = $request->location;
                $order->order_date = $request->order_date;
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
}

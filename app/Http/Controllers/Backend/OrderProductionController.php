<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductionPhoto;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderProductionController extends Controller
{
    public function store_photos(Request $request)
    {
        $order = Order::find($request->id_order);

        if ($request->hasFile('file')) {

            if ($order->status_production == 0) {
                $order->status_production = 1;
                $order->save();
            }

            $file = $request->file('file');
            $imageName = $order->invoice . '_production_' . uniqid() . '_' . $file->getClientOriginalName();
            $uploadPath = 'uploads/production';
            Storage::putFileAs($uploadPath, $file, $imageName);

            $productionPhoto = ProductionPhoto::create([
                'photo_production' => $imageName,
                'order_id' => $request->id_order
            ]);

            return response()->json([
                'message' => 'Design berhasil diupload!',
                'id' => $productionPhoto->id,
                'photo_production' =>  $imageName,
            ]);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $production_photo = ProductionPhoto::find($request->id);
            if ($production_photo) {
                if ($production_photo->photo_production) {
                    Storage::disk('private')->delete('uploads/production/' . $production_photo->photo_production);
                }

                $production_photo->delete();
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

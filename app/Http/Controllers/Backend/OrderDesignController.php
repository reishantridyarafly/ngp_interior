<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

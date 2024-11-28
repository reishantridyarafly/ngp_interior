<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        try {
            $order = new Rating();
            $order->user_id = Auth::user()->id;
            $order->order_id = $request->id_order;
            $order->rating = $request->rating;
            $order->comment = $request->comment;

            $order->save();

            return response()->json(['message' => 'Data berhasil dikirim']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Oppss, error...',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

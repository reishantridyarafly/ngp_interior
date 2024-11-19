<?php

namespace App\Http\Controllers\Print;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderSection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RABController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::find($request->idorder);
        $sections = OrderSection::where('order_id', $order->id)->orderBy('created_at', 'asc')->get();
        $total_amount = $sections->sum('total_amount');

        $items = collect();
        foreach ($sections as $section) {
            $items = $items->merge(OrderItem::where('section_id', $section->id)->orderBy('created_at', 'asc')->get());
        }

        $pdf = Pdf::loadView('backend.orders.print.rab', compact('order', 'sections', 'items', 'total_amount'));
        return $pdf->download($order->invoice . '.pdf');
    }
}

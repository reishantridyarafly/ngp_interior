<?php

namespace App\Http\Controllers\Print;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderPrintController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : null;
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : null;

        if (!$startDate && !$endDate) {
            $orders = Order::with('user')
                ->orderBy('invoice', 'asc')
                ->get();
        } else {
            $orders = Order::with('user')
                ->whereBetween('order_date', [$startDate, $endDate])
                ->orderBy('invoice', 'asc')
                ->get();
        }

        $total = $orders->sum(function ($order) {
            return $order->sections->sum('total_amount');
        });

        $pdf = Pdf::loadView('backend.orders.print.report', compact(['orders', 'total']));
        return $pdf->download("Laporan pemesanan.pdf");
    }
}

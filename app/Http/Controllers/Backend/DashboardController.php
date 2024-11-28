<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderSection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_income = OrderSection::sum('total_amount');
        $amount_order = Order::all()->count();
        return view('backend.dashboard.index', compact(['total_income', 'amount_order']));
    }
}

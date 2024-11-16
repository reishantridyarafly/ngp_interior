<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\OrderSection;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index($idSection)
    {
        $section = OrderSection::with('order')->find($idSection);
        $items = OrderItem::where('section_id', $idSection)->orderBy('created_at', 'asc')->get();
        return view('backend.orders.subdetail.item', compact(['section', 'items']));
    }

    public function store(Request $request)
    {
        $submittedIds = $request->item_id ? array_filter($request->item_id) : [];
        $existingItems = OrderItem::where('section_id', $request->id_section)->get();
        $existingItems->each(function ($item) use ($submittedIds) {
            if (!in_array($item->id, $submittedIds)) {
                $item->delete();
            }
        });

        foreach ($request->description as $index => $description) {
            $itemId = $request->item_id[$index] ?? null;

            OrderItem::updateOrCreate(
                [
                    'id' => $itemId,
                ],
                [
                    'section_id' => $request->id_section,
                    'description' => $description,
                    'volume' => $request->volume[$index],
                    'unit' => $request->unit[$index],
                    'unit_price' => str_replace(['Rp', ' ', '.'], '', $request->unit_price[$index]),
                    'subtotal' => str_replace(['Rp', ' ', '.'], '', $request->subtotal[$index]),
                ]
            );
        }

        $section = OrderSection::find($request->id_section);
        $section->subtotal = str_replace(['Rp', ' ', '.'], '', $request->sub_total);
        $section->discount = $request->discount ? str_replace(['Rp', ' ', '.'], '', $request->discount) : null;
        $section->total_amount = str_replace(['Rp', ' ', '.'], '', $request->total_amount);
        $section->save();

        return response()->json(['message' => 'Data berhasil disimpan.']);
    }
}

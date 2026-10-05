<?php

namespace App\Http\Controllers;
use App\Models\Borrow;
use App\Models\Partner;
use App\Models\Item;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with(['partner', 'items'])->latest()->get();
        return view('borrows.index', compact('borrows'));
        //return $borrows;
    }

    public function create()
    {
        $partners = Partner::all();
        $items = Item::all();
        return view('borrows.create', compact('partners', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'type' => 'required|in:lent_out,borrowed_in',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $borrow = Borrow::create([
            'partner_id' => $request->partner_id,
            'type' => $request->type,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'note' => $request->note,
            'status' => 'pending',
        ]);

        foreach ($request->items as $itemData) {
            $borrow->items()->attach($itemData['item_id'], ['quantity' => $itemData['quantity']]);
        }

        return redirect()->route('borrows.index')->with('success', 'Borrow transaction created successfully.');
    }
}

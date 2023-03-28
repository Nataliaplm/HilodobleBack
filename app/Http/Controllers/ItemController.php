<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::get();

        return view ('home', compact('items'));
    }

    public function create()
    {
        $item = new Item();
        return view('createItem', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Item::$rules);

        $item = new Item();
        $item->itemName = $request->itemName;
        $item->category = $request->category;
        $item->description = $request->description;
        $item->image = $request->image;
        $item->stockQuantity = $request->stockQuantity;
        $item->purchaseQuantity;
        $item->price = $request->price;
        $item->save();

        return redirect()->route('home')
            ->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        return view('showItem',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);

        return view('editItem', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=request()->except('_token', '_method');

        Item::where('id', '=', $id)->update($item);

        return redirect()->route('home')
            ->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
       /*  if (!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized action.');
        } */

        $item = Item::find($id);

        Item::destroy($id);

        return redirect()->route('home');
    }
}


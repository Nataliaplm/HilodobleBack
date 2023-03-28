<?php

namespace App\Http\Controllers;

use Cloudinary;
use Illuminate\Http\UploadedFile;
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

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->getRealPath();
            $cloudinary_upload = Cloudinary\Uploader::upload($image_path, [
                'folder' => 'items'
            ]);
        $item->image = $cloudinary_upload['secure_url'];
        }

        $item->stockQuantity = $request->stockQuantity;
        $item->purchaseQuantity = $request->purchaseQuantity;
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
        $item = Item::find($id);

        Item::destroy($id);

        return redirect()->route('home');
    }
}


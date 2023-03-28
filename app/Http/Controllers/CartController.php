<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function add(Request $request)
{
    $user = auth()->user();
    $item = Item::findOrFail($request->input('item_id'));
    $purchaseQuantity = $request->input('purchaseQuantity', 1);

    $cartItem = $user->cart()->where('item_id', $item->id)->first();

    if ($cartItem) {
        $cartItem->purchaseQuantity += $purchaseQuantity;
        $cartItem->save();
    } 
    if (!$cartItem) {
        $user->cart()->create([
            'item_id' => $item->id,
            'purchaseQuantity' => $purchaseQuantity,
        ]);
    }
    
    return redirect('/cart');
}



    public function show()
{
    $user = auth()->user();
    $cartItems = $user->cart()->with('item')->get();

    return view('cart', [
        'cartItems' => $cartItems,
    ]);
}


public function remove(Request $request)
{
    $user = auth()->user();
    $item_id = $request->input('item_id');
    $cartItem = $user->cart()->where('id', $item_id)->first();

    if ($cartItem !== null) {
        $cartItem->delete();
    }
    
    return redirect('/cart');
}

public function update(Request $request)
{
    $user = auth()->user();
    $item_id = $request->input('item_id');
    $cartItem = $user->cart()->where('id', $item_id)->first();

    if ($cartItem !== null) {
        $newQuantity = $request->input('purchaseQuantity');
        $cartItem->purchaseQuantity = $newQuantity;
        $cartItem->save();
    }
    
    return redirect('/cart');
}


}

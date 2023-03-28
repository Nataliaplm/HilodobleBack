@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Carrito de compras de <strong style="font-size:20px;color:blueviolet;">{{ Auth::user()->name }}</strong></p>

        @if ($cartItems->isEmpty())
            <p>No hay productos en tu carrito.</p>
        @endif

        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Precio total</th>
                        <th></th>
                    </tr>
                </thead>

                <!-- Below we are iterating over the $cartItems variable and accessing the itemName, price, and quantity properties of each Item model associated with the current cart item using the item relationship. We are also calculating the total price of all cart items using the sum() method on the $cartItems collection, and multiplying the price and quantity properties of each Item model to get the total price for each cart item. -->
                <tbody>
                @foreach ($cartItems as $cartItem)
    <tr>
        <td>{{ $cartItem->item->itemName }}</td>
        <td>{{ $cartItem->item->price }}</td>
        <td>
            <form action="{{ route('update') }}" method="POST">
                @csrf
                <input type="number" name="purchaseQuantity" class="form-control" value="{{ $cartItem->purchaseQuantity }}" min="1">
                <input type="hidden" name="item_id" value="{{ $cartItem->id }}">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </td>
        <td>{{ $cartItem->item->price * $cartItem->purchaseQuantity }} €</td>
        <td>
            <form action="{{ route('remove') }}" method="POST">
                @csrf
                <input type="hidden" name="item_id" value="{{ $cartItem->id }}">
                <button type="submit" class="btn btn-danger">Remove</button>
            </form>
        </td>
    </tr>
@endforeach




                            <tr>
                                <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                <td><strong>{{ $cartItems->sum(function ($cartItem) { return $cartItem->item->price * $cartItem->purchaseQuantity; }) }} €</strong></td>
                            </tr>
                    </tbody>

            </table>
            <div class="text-center">
                <a href="/" class="btn btn-primary">Seguir comprando</a>
                <a href="#" class="btn btn-success">Pagar</a>
            </div>
     
        @endif
    </div>
@endsection

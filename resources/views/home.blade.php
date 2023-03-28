@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Listado de productos</h1>
    @if (Auth::check())
        <p>Hola <strong style="font-size:16px;color:blueviolet;">{{ Auth::user()?->name }}</strong> Este es el listado de productos</p>
        @if (session('success'))
            <div class="alert alert-success"><br>
                {{ session('success') }}
            </div>
        @endif
    @endif

        <div class="mb-3">
            <a href="{{ route('create') }}"> <button class="createItem">Añadir producto</button></a>
        </div>
</div>

<div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Stock</th>
                    <th>Vendidos</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset($item->image) }}" alt="{{ $item->itemName }}" class="img-thumbnail" style="max-width: 100px;"></td>
                        <td>{{ $item->stockQuantity }}</td>
                        <td>{{ $item->purchaseQuantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('showItem', $item->id) }}" ><img src="../images/show.png" alt="eye button"></a><br>
                            <a href="{{ route('editItem',['id'=>$item->id]) }}" ><img src="../images/editPencil.png" alt="Pencil button"></a><br>
                            <form action="{{ route('deleteItem', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="deleteItem" type="submit"  onclick="return confirm('Estás seguro de querer borrar este producto?')"><img src="../images/deleteBin.png" alt="Bin button"></button>
                            </form>
                            <form action="{{ route('add') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                
                                <input type="number" name="purchaseQuantity" class="form-control" value="1" min="1">
                                <button type="submit" class="btn btn-primary btn-sm">Añadir al carrito</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>
@endsection

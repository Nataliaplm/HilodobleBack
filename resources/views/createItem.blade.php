@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Producto</h1>
    <form method="POST" action="{{ route('storeItem') }}" role="form" enctype="multipart/form-data">
        @csrf
            <div class="itemData">
                <div class="form-group">
                    <label for="itemName">Nombre del producto</label>
                   {{--  @auth
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    @endauth --}}
                    <input type="text" name="itemName" id="itemName" class="form-control" placeholder="Producto" required>
                    @if ($errors->has('itemName'))
                        <span class="invalid-feedback">{{ $errors->first('itemName') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="category">Categoría</label>
                    <input type="text" name="category" id="category" class="form-control" placeholder="Categoría" required>
                    @if ($errors->has('category'))
                        <span class="invalid-feedback">{{ $errors->first('category') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="5"placeholder="Descripción" required></textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Imagen URL</label>
                    <input type="url" name="image" id="image" class="form-control" placeholder="Imagen" required>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="stockQuantity">Stock</label>
                    <input type="number" name="stockQuantity" id="stockQuantity" class="form-control" min="0" placeholder="Número" required>
                    @if ($errors->has('stockQuantity'))
                        <span class="invalid-feedback">{{ $errors->first('stockQuantity') }}</span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" min="0.01" placeholder="Precio" required>
                    @if ($errors->has('price'))                
                        <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                    @endif
                </div>
            </div>
        </div>          
            <div class="buttons">
                <button type="submit" class="addButton">Guardar</button>
                <a href="{{ route('home') }}"><button class="cancelButton">Cancelar</a>
            </div>
    </form>
</div>
@endsection
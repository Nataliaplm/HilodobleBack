@extends('layouts.app')

@section('template_title')
    Update Item
@endsection

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form method="POST" action="{{ route('updateItem', $item->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="itemData">
            <div class="form-group">
                <label for="itemName">Nombre del producto</label>
                <input type="text" name="itemName" id="itemName" class="form-control{{ $errors->has('itemName') ? ' is-invalid' : '' }}" value="{{ $item->itemName }}" required>
                @if ($errors->has('itemName'))
                    <span class="invalid-feedback">{{ $errors->first('itemName') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="category">Categoría</label>
                <input type="text" name="category" id="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ $item->category }}" required>
                @if ($errors->has('category'))
                    <span class="invalid-feedback">{{ $errors->first('category') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" required>{{ $item->description }}</textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="image">Imagen URL</label>
                <input type="url" name="image" id="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ $item->image }}" required>
                @if ($errors->has('image'))
                    <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="stockQuantity">Stock</label>
                <input type="number" name="stockQuantity" id="stockQuantity" class="form-control{{ $errors->has('stockQuantity') ? ' is-invalid' : '' }}" value="{{ $item->stockQuantity }}" min="0" required>
                @if ($errors->has('stockQuantity'))
                    <span class="invalid-feedback">{{ $errors->first('stockQuantity') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ $item->price }}" step="0.01" min="0.01" required>
                @if ($errors->has('price'))
                    <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                @endif
            </div>
        </div>
    </div>
        <div class="buttons">
        <button type="submit" class="saveButton">Guardar</button>
        <a href="{{ route('home') }}"><button class="cancelButton">Cancelar</a>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('template_title')

@endsection

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form class="form" method="POST" action="{{ route('updateUser', $user->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="name">Nombre de Usuario</label>
            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ $user->name }}" value="{{ $user->name }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ $user->surname }}" value="{{ $user->surname }}" required>
            @if ($errors->has('surname'))
                <span class="invalid-feedback">{{ $errors->first('surname') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" min="0" required>
            @if ($errors->has('stockQuantity'))
                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ $user->phone }}" value="{{ $user->phone}}" required>
            @if ($errors->has('phone'))
                <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="city">Ciudad</label>
            <input type="text" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ $user->city }}" value="{{ $user->city}}" required>
            @if ($errors->has('city'))
                <span class="invalid-feedback">{{ $errors->first('city') }}</span>
            @endif
        </div>

         <div class="form-group">
            <label for="postcode">Código postal</label>
            <input type="text" name="postcode" id="postcode" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" placeholder="{{ $user->postcode }}" value="{{ $user->postcode}}" required>
            @if ($errors->has('postcode'))
                <span class="invalid-feedback">{{ $errors->first('postcode') }}</span>
            @endif
        </div>
        
        <div class="buttons">
            <button id="save" type="submit" class="btn btn-primary">Guardar</button>
            <a id="cancel" href="{{ route('usersList') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

@endsection

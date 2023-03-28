@extends('layouts.app')

@section('content')
    <div class="container">

    @foreach ($users as $user)

        <h2><b>Nombre</b>: {{$user->name}}</h2>
        <h2><b>Apellido</b>: {{$user->surname}}</h2>
        <h3><b>Correo Electrónico</b>: {{$user->email}}</h3>
        <h3><b>Teléfono</b>: {{$user->phone}}</h3>
        <h3><b>Ciudad</b>: {{$user->city}}</h3>
        <h3><b>Dirección</b>: {{$user->address}}</h3>
        <h3><b>Código postal</b>: {{$user->postcode}}</h3>
        

        <a href="{{ route('editUser', ['id' => $user->id]) }}">Editar</a>
        <a href="{{ route('showUser',['id'=>$user->id]) }}" >Mostrar</a>

        <form action="{{ route('deleteUser', $user->id) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center" onclick="return confirm('¿Seguro que quieres borrar est usuario? {{ $user->name }} - ID {{ $user->id }}')">Eliminar</button>
        </form>
    @endforeach
    </div>

@endsection

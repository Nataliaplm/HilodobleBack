@extends('layouts.app')


@section('content')
    <h1 style="padding-top:20px">{{$user->name}}</h1>
    <h1 style="padding-top:20px">{{$user->surname}}</h1>
    <div class="containerItem">
        <div class="containerData" style="padding:30px">
            {{-- <h2 style="padding:10px">Categoría:{{$item->category}}</h2> --}}
            <h4>Nombre: {{$user->email}}</h4>
            <h5>Apellido: {{$user->phone}}</h5>
            <h5>Ciudad: {{$user->city}}</h5>
            <h5>Dirección: {{$user->address}}</h5>
            <h5>Código postal: {{$user->postcode}}</h5>
            <a href="{{ route('usersList') }}"><button class="backButton">Volver</a>
        </div>
    </div>
@endsection
@extends('layouts.app')


@section('content')
    <h1 style="padding-top:40px">{{$item->itemName}}</h1>
    <div class="containerItem">
        <img src="{{$item->image}}" alt="foto del producto" style="width:330px; border:solid 4px #50087d">
        <div class="containerData" style="padding:30px">
            {{-- <h2 style="padding:10px">Categoría:{{$item->category}}</h2> --}}
            <h4>{{$item->description}}</h4>
            <h5> {{$item->price}}€</h5>
            <h5>Stock disponible: {{$item->stockQuantity}}</h5>
            <a href="{{ route('home') }}"><button class="backButton">Volver</a><br>
        </div>
    </div>
@endsection

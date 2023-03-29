@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de usuarios</h1>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>C.P.</th>
                        <th>Población</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->postcode }}</td>
                            <td>{{ $user->city }}</td>
                            <td>   
                                <a href="{{ route('editUser', ['id' => $user->id]) }}">Editar</a>
                                <a href="{{ route('showUser', $user->id)}}">Mostrar</a>
                                <form class="deleteBtn" action="{{ route('deleteUser', $user->id) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="submit" class="deletedBtn" onclick="return confirm('¿Seguro que quieres borrar est usuario? {{ $user->name }} - ID {{ $user->id }}')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody> 
                </table>
        </div> 
    @endsection

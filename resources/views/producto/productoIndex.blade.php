@extends('layouts.temp')
@section('contenido')
    <h1>Listado de productos</h1>
    <p>
        <a href="{{ route('producto.create') }}">Agregar producto</a>
    </p>

    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Folio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>
                        <a href="{{ route('producto.show', $producto->id) }}">{{$producto->marca}}</a>
                    </td>
                    <td>{{$producto->categoria}}</td>
                    <td>{{$producto->folio}}</td>
                    <td>
                        <a href="{{ route('producto.edit', $producto) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
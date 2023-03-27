@extends('layouts.temp')
@section('contenido')
    <h1>Detalle de productos</h1>
    <p>
        <a href="{{ route('producto.index') }}">Listado de Productos</a>
    </p>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Folio</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->marca}}</td>
                    <td>{{$producto->categoria}}</td>
                    <td>{{$producto->folio}}</td>
                </tr>
        </tbody>
    </table>

    <form action="{{ route('producto.destroy', $producto) }}" method="POST">
        @csrf
        @method('delete')
        <input type="submit" value="Eliminar producto">
    </form>
@endsection
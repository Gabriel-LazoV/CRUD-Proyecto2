@extends('layouts.temp')
@section('contenido')
    <h1>Formulario de productos</h1>

    <p>
        <a href="{{ route('producto.index') }}">Listado de Productos</a>
    </p>
    @if(isset($producto))
        <!-- Edicion de programa -->
        <form action="{{ route('producto.update', $producto)}}" method ="POST">
            @method('PATCH')
    @else
        <!-- Creacion de programa -->
        <form action="{{ route('producto.store')}}" method ="POST">
    @endif
            @csrf
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ $producto->marca ?? ''}}">
            <br>
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" value="{{ $producto->categoria ?? ''}}">
            <br>
            <label for="folio">Folio</label>
            <input type="text" name="folio" id="folio" value="{{ $producto->folio ?? ''}}">
            <br>
            <input type="submit" value="Guardar" value="{{ $producto->Guardar ?? ''}}">
        </form>
@endsection
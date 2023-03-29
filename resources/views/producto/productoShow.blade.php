@extends('layouts.windmill')
@section('contenido')

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalle de producto
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            {{ $producto->marca }}
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            <ul>
                <li>Marca: {{ $producto->marca }}</li>
                <li>Categoria: {{ $producto->categoria }}</li>
                <li>Folio: {{ $producto->folio }}</li>
            </ul>
        </div>
    </div>
    <form action="{{ route('producto.destroy', $producto) }}" method="POST">
        @csrf
        @method('delete')
        <div>
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                type="submit"
            >
                <svg class="w-4 h-4 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                </svg>    
                <span>Eliminar producto</span>
            </button>
        </div>
    </form>
@endsection
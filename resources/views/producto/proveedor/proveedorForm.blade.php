@extends('layouts.windmill')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Formulario de proveedores
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @if ($errors->any())
        <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
            <h4 class="mb-4 font-semibold">
                Verifique los campos del formulario
            </h4>
            <p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </p>
        </div>
    @endif
        @if(isset($proveedor))
            <!-- Edicion de programa -->
            <form action="{{ route('proveedor.update', $proveedor)}}" method ="POST">
                @method('PATCH')
        @else
            <!-- Creacion de programa -->
            <form action="{{ route('proveedor.store')}}" method ="POST">
        @endif    

        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre del proveedor:</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:shadow-outline-purple @error('marca') border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:shadow-outline-red @enderror focus:outline-none dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text"
                    name="nombre"
                    id="nombre"
                    value="{{ old('nombre') ?? $proveedor->nombre ?? ''}}"
                />
                @error('nombre')
                    <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span>
                @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Marca del proveedor:</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text"
                    name="marca"
                    id="marca"
                    value="{{ old('marca') ?? $proveedor->marca ?? ''}}"
                />
                @error('marca')
                    <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span>
                @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Telefono:</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="number"
                    name="telefono"
                    id="telefono"
                    value="{{ old('telefono') ?? $proveedor->telefono ?? ''}}"
                />
                @error('telefono')
                    <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span>
                @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Correo del proveedor:</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="email"
                    name="correo"
                    id="correo"
                    value="{{ old('correo') ?? $proveedor->correo ?? ''}}"
                />
                @error('correo')
                    <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span>
                @enderror
        </label>

        <div class="mt-4">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                type="submit"
            >
                <svg class="w-6 h-6 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"  aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                </svg>
                <span>Guardar</span>
                
            </button>
        </div>
        </form>
    </div>
@endsection
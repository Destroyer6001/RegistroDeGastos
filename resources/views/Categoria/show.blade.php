@extends('layouts.app')

@section('title','categorias')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-9/12 border border-gray-200 rounded-lg shadow-lg">
    <a href="{{route('categoria.index')}}" class="btn text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Regresar</a>
    <br>
    <br>
    <h1 class="text-3xl mb-12 font-bold">Detalles</h1>
    <div class="relative mt-10 overflow-x-auto">
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>
                Nombre : {{$category->name}}
            </li>
            <li>
                Descripcion : {{$category->description}}
            </li>
        </ul>
    </div>
</div>


@endsection
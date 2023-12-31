@extends('layouts.app')

@section('title','gastos')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-9/12 border border-gray-200 rounded-lg shadow-lg">

<h1 class="text-3xl mb-12 font-bold">Gastos</h1>
<a href="{{route('gasto.create')}}" class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear</a>
@if(session('mensaje'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-8 py-8 mt-10 mb-10" role="alert">
        <p class="font-bold">Felicidades</p>
        <p class="text-sm">{{session('mensaje')}}</p>
    </div>
@endif
<div class="relative mt-10 overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Valor
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo de gasto
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$expense->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$expense->value}}
                    </td>
                    <td class="px-6 py-4">
                        {{$expense->description}}
                    </td>
                    <td class="px-6 py-4">
                        {{$expense->date}}
                    </td>
                    <td class="px-6 py-4">
                        {{$expense->Categories->name}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('gasto.edit',$expense->id)}}" class="btn focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900">Editar</a>
                        |
                        <a href="{{route('gasto.show',$expense->id)}}" class="btn focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Detalle</a>
                        |
                        <form action="{{route('gasto.destroy',$expense->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" Value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>


@endsection
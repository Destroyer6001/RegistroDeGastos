@extends('layouts.app')

@section('title','gastos')

@section('content')

<div class="block mx-auto my-40 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
        <a href="{{route('gasto.index')}}" class="btn text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Regresar</a>
        <p class="text-5xl mb-14 mt-10 text-center font-bold">Editar Gasto</p>
        @if($errors->has('value'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Lo sentimos</strong>
                <span class="block sm:inline"> {{ $errors->first('value') }} </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        @if($errors->has('date'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Lo sentimos</strong>
                <span class="block sm:inline"> {{ $errors->first('date') }} </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        <form action="{{route('gasto.update',['id' => $expense->id])}}" class="mt-8" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="number" name="value" placeholder="Valor"
            id="value" class="border border-gray-200 rounded-md bg-gray-200 w-full
            placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{old('value',$expense->value)}}">

            <input type="text" name="description" placeholder="Descripcion"
            id="description" class="border border-gray-200 rounded-md bg-gray-200 w-full
            placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{old('description',$expense->description)}}">

            <input type="date" name="date" placeholder="Fecha"
            id="date" class="border border-gray-200 rounded-md bg-gray-200 w-full
            placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{old('date',$expense->date)}}">

            <select name="category_id" id="category_id" class="border border-gray-200 rounded-md bg-gray-200 w-full
            placeholder-gray-900 p-2 my-2 focus:bg-white">
            <option value="">Seleccione una categoria</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ (old('category_id', $expense->category_id) == $category->id) ? 'selected' : '' }}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>

            <input type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
            p-3 my-3 hover:bg-indigo-600" value="Guardar">
            
        </form>
    </div>

@endsection
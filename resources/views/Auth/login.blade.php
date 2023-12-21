@extends('layouts.app')

@section('title','Login')

@section('content')
    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
        @if(session('mensaje'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-8 py-8 mt-10 mb-10" role="alert">
                <p class="font-bold">Felicidades</p>
                <p class="text-sm">{{session('mensaje')}}</p>
            </div>
        @endif
        @if($errors->has('email'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Lo sentimos</strong>
                <span class="block sm:inline"> {{ $errors->first('name') }} </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        @if($errors->has('password'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Lo sentimos</strong>
                <span class="block sm:inline"> {{ $errors->first('name') }} </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        <h1 class="text-3xl text-center font-bold">Inicio De Sesion</h1>
        <form action="{{route('Auth.storeLogin')}}" class="mt-4" method="POST">
            @csrf
            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="email" name="email" id="email">

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="password" name="password" id="password">

            <input type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
            p-2 my-3 hover:bg-indigo-600" value="Inicio Sesion">
        </form>


    </div>
@endsection
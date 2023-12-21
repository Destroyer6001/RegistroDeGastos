<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Gastos;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{

    public function index()
    {
        $user_Id = auth()->id();
        $categories = Categoria::where('user_Id','=',$user_Id)->get();
        return view('Categoria.index',compact('categories'));
    }


    public function create()
    {
        return view('Categoria.create');
    }


    public function store(CategoriaRequest $request)
    {
        try{
            
            $category = new Categoria();
            $category->name = $request->input('name');
            $category->user_Id = $request->input('user_Id');
            $category->description = $request->input('description');
            $category->save();

            return redirect('/categorias')->with('mensaje','la categoria ha sido creada exitosamente');

        }catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $category = Categoria::find($id);
        return view('Categoria.show', compact('category'));
    }

 
    public function edit(Categoria $categoria,$id)
    {
        $category = Categoria::find($id);
        return view('Categoria.edit', compact('category'));
    }


    public function update(CategoriaRequest $request, $id)
    {
        try{

            $category = Categoria::find($id);
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();
            return redirect('/categorias')->with('mensaje','la categoria ha sido actualizada exitosamente');

        }catch(Exception $e)
        {
            return $e->getMessage();
        }

    }

    public function destroy($id)
    {
        try{

            $category = Categoria::find($id);
            $expense = Gastos::where('category_id',"=",$id)->count();

            if($expense > 0)
            {
                return redirect('/categorias')->with('error','lo sentimos pero no puede eliminar una categoria que ya tiene registros asociados');
            }
            else
            {
                $category->delete();
                return redirect('/categorias')->with('mensaje','la categoria ha sido eliminada exitosamente');
            }

        }catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}

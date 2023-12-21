<?php

namespace App\Http\Controllers;

use App\Models\Gastos;
use Illuminate\Http\Request;
use App\Http\Requests\GastosRequest;
use App\Models\Categoria;

class GastosController extends Controller
{


    public function index()
    {
        $user_Id = auth()->id();
        $expenses = Gastos::with('Categories')->where('user_Id','=',$user_Id)->get();
        return view('Gastos.index',compact('expenses'));
    }

 
    public function create()
    {
        $user_Id = auth()->id();
        $categories = Categoria::where('user_Id','=', $user_Id)->get();
        return view('Gastos.create',compact('categories'));
    }


    public function store(GastosRequest $request)
    {
        try{
            $expense = new Gastos();
            $expense->description = $request->input('description');
            $expense->date = $request->input('date');
            $expense->value = $request->input('value');
            $expense->user_Id = $request->input('user_Id');
            $expense->category_id = $request->input('category_id');
            $expense->save();

            return redirect('/gastos')->with('mensaje','Gasto guardado en el sistema');

        }catch(Exception $e)
        {
            return $e->getMessages();
        }
    }


    public function show($id)
    {
        $expense = Gastos::with('Categories')->find($id);
        return view('Gastos.show',compact('expense'));
    }

    public function edit($id)
    {
        $user_Id = auth()->id();
        $expense = Gastos::find($id);
        $categories = Categoria::where('user_Id','=',$user_Id)->get();
        return view('Gastos.edit',compact('expense','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{

            $expense = Gastos::find($id);
            $expense->description = $request->input('description');
            $expense->date = $request->input('date');
            $expense->value = $request->input('value');
            $expense->category_id = $request->input('category_id');
            $expense->save();

            return redirect('/gastos')->with('mensaje','Gasto actualizado en el sistema');

        }catch(Exception $e)
        {
            return $e->getMessages();
        }
    }


    public function destroy($id)
    {
        try{

            $expense = Gastos::find($id);
            $expense->delete();
            
            return redirect('/gastos')->with('mensaje','Gasto eliminado correctamente del sistema');

        }catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}

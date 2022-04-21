<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $categorias = Categoria::paginate(2);
       $query = Categoria::query()->orderBy('Nombre');

       if (request('buscar')) {         
         $query->where('Nombre','LIKE','%'.request('buscar').'%');
       }
       
           return Inertia::render('Categoria/List', ['categorias' => $query->paginate(10)->withQueryString()]);
            
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Categoria/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $request->validate(
            [
                'Nombre' => 'Required|max:100',
                'Descripcion' => 'nullable',

            ]
        );

        Categoria::create($request->all());
  
        return Redirect::route('categorias.index')->with('success', 'Categoría creada.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return Inertia::render('Categoria/EditForm',  ['categorias' => "$categoria"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate(
            [
                'Nombre' => 'required',
                'Descripcion' => 'nullable',              
            ]
            );
        $categoria->update($request->all());
        
        return Redirect::route('categorias.index')->with('success', 'Categoría editada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {

        $categoria->delete();
        return Redirect::route('categorias.index')->with('success', 'Categoría eliminada.');
    }
}

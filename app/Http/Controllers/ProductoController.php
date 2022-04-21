<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //$query = Producto::all();
        // Persona::with( 'ciudad' )->orderBy( 'id' )->get();
        $query = Producto::with( 'categorias' )->orderBy( 'Nombre' );

        if ( request( 'buscar' ) ) {

            $query->where( 'Nombre', 'LIKE', '%'.request( 'buscar' ).'%' );
        }
        // return dd( $query );
        return Inertia::render( 'Producto/List', ['productos' =>            $query->paginate( 10 )
        ->withQueryString()] );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {

        //   return Auth()->user()->name;

        $categorias = Categoria::all();

        return Inertia::render( 'Producto/Form', ['categorias' => $categorias] );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $request->validate(
            [
                'Nombre' => 'Required|max:150',
                'Stock' => 'Required|max:8',
                'UnidadMedida' => 'Required|max:50',
                'PrecioVenta' => 'Required|max:20',
                'categoria_id' => 'Required',

            ]
        );

        Producto::create( $request->all() );

        return Redirect::route( 'productos.index' )->with( 'success', 'Producto creado.' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( Producto $producto ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( Producto $producto ) {

        $categorias = Categoria::all();
        return Inertia::render( 'Producto/EditForm',  ['productos' => "$producto", 'categorias'=> $categorias] );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Producto $producto ) {

        $request->validate(
            [
                'Nombre' => 'Required|max:150',
                'Stock' => 'Required|max:8',
                'UnidadMedida' => 'Required|max:50',
                'PrecioVenta' => 'nullable',
                'categoria_id' => 'Required',

            ]
        );

        $producto->update( $request->all() );

        return Redirect::route( 'productos.index' )->with( 'success', 'Producto editado.' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( Producto $producto ) {
        $producto->delete();
        return Redirect::route( 'productos.index' )->with( 'success', 'Producto eliminado.' );
    }
}

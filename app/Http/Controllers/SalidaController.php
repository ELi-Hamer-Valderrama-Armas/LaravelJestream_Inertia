<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Salida::with( 'personas', 'users' )->orderBy( 'created_at' );

        if ( request( 'buscar' ) ) {

            $query->where( 'SerieComprobante', 'LIKE', '%'.request( 'buscar' ).'%' );
        }
        // return dd( $query );
        return Inertia::render( 'Salida/List', ['salidas' =>            $query->paginate(10)
        ->withQueryString()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $clientes = Persona::where( 'TipoPersona', '=', 'Cliente' )->get();
        $user = auth()->id();
        $usuarios = User::where( 'id', '=', $user )->get();
        $productos = Producto::all();

        return Inertia::render( 'Salida/Form', ['clientes' => $clientes, 'usuarios'=>$usuarios, 'productos'=>$productos ] );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [

    
                '0.Fecha' => 'required|after:today',
                '0.TipoComprobante' => 'required',
                '0.SerieComprobante' => 'required',
                '0.NumeroComprobante' => 'required',
                '0.Impuesto' => 'required',
                '0.Total' => 'required',
                '0.persona_id' => 'required',
                '0.user_id' => 'required',

                 '1.0.id' => 'required',
                '1.0.precio' => 'required',
                '1.0.cantidad' => 'required',
                '1.0.precio' => 'required',  
                 
  ]
     );
     $datos=$request;

        for ( $i = 0; $i<1; $i++ ) 
        {
            $salidaT = $datos[$i];

        }
        $salida = Salida::create($salidaT);
 
        for ( $w = 1; $w<2; $w++ ) 
        {
            $detalleT = $datos[$w];
           
            }
            foreach($detalleT as $detalle){

                 $stock = Producto::where([
        ['id', '=', $detalle['id']],
    ])->first();
    if( $stock){
       $stock->decrement('Stock', $detalle['cantidad']); 
    }

    $salida->productos()->attach($detalle['id'], ['precio'=>$detalle['precio'],'cantidad' => $detalle['cantidad'],'monto'=>$detalle['monto']]); 

}

 return Redirect::route('salidas.index')->with('success','Salida creada.');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        $usuarios = User::find($salida->user_id );
        $cliente = Persona::find($salida->persona_id);

foreach ($salida->productos as $ing) {

}
return Inertia::render('Salida/Show', ['salidas' => $salida,'clientes'=>$cliente,'usuario'=>$usuarios]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        $salida->delete();
        return Redirect::route( 'salidas.index' )->with( 'success', 'Salida eliminada.' );
    }
}

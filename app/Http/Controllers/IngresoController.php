<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\ProductoIngreso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class IngresoController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $query = Ingreso::with( 'personas', 'users' )->orderBy( 'created_at' );

        if ( request( 'buscar' ) ) {

            $query->where( 'TipoComprobante', 'LIKE', '%'.request( 'buscar' ).'%' );
        }
        // return dd( $query );
        return Inertia::render( 'Ingreso/List', ['ingresos' =>            $query->paginate( 10 )
        ->withQueryString()] );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {

        $proveedores = Persona::where( 'TipoPersona', '=', 'Proveedor' )->get();
        $user = auth()->id();
        $usuarios = User::where( 'id', '=', $user )->get();
        $productos = Producto::all();

        return Inertia::render( 'Ingreso/Form', ['proveedores' => $proveedores, 'usuarios'=>$usuarios, 'productos'=>$productos ] );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        
        /*$categorias = Categoria::all();
*/
       dd($request->all());
 
//return dd($datos);
       
      /*   for ( $i = 0; $i<1; $i++ ) {
            $ingreso = $datos[$i];

        }
         Ingreso::create( $ingreso);



        $ingreso->validate(
            [
                'Fecha' => 'nullable',
                'TipoComprobante' => 'nullable',
                'SerieComprobante' => 'nullable',
                'NumeroComprobante' => 'nullable',
                'Impuesto' => 'nullable',
                'Total' => 'nullable',
                'persona_id' => 'Required',
                'user_id' => 'Required',
                

            ]
        );

      

        for ( $w = 1; $w<2; $w++ ) {
            $horar = $datos[$i];
           
            
 }

  
       $c = count( $horar);
             for ( $s = 0; $s<$c; $s++ ) {

                $final[] = $horar[$s];
                
            }

            
        
         
    $ingreso = new Ingreso;*/
     
    /*       foreach ($final as $req){
       ProductoIngreso::create([
           'producto_id'   => $req['id'],
           'ingreso_id'     => $req['id'],
           'precio'   => $req['precio'],
           'cantidad'   => $req['cantidad'],
           'monto'   => $req['monto']
       ]);
   }
   */
      
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( Ingreso $ingreso ) {
        $ingreso->delete();
        return Redirect::route( 'ingresos.index' )->with( 'success', 'Ingreso eliminado.' );
    }
}

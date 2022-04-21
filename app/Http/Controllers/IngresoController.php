<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use PDF;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $query = Ingreso::with('personas', 'users')->orderBy('created_at');

        if (request('buscar')) {

            $query->where('SerieComprobante', 'LIKE', '%' . request('buscar') . '%');
        }
        // return dd( $query );
        return Inertia::render('Ingreso/List', ['ingresos' =>            $query->paginate(10)
            ->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $proveedores = Persona::where('TipoPersona', '=', 'Proveedor')->get();
        $user = auth()->id();
        $usuarios = User::where('id', '=', $user)->get();
        $productos = Producto::all();

        return Inertia::render('Ingreso/Form', ['proveedores' => $proveedores, 'usuarios' => $usuarios, 'productos' => $productos]);
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
        $datos = $request;

        for ($i = 0; $i < 1; $i++) {
            $ingresoT = $datos[$i];
        }
        $ingreso = Ingreso::create($ingresoT);

        for ($w = 1; $w < 2; $w++) {
            $detalleT = $datos[$w];
        }
        foreach ($detalleT as $detalle) {

            $stock = Producto::where([
                ['id', '=', $detalle['id']],
            ])->first();
            if ($stock) {
                $stock->increment('Stock', $detalle['cantidad']);
            }

            $ingreso->productos()->attach($detalle['id'], ['precio' => $detalle['precio'], 'cantidad' => $detalle['cantidad'], 'monto' => $detalle['monto']]);
        }

        return Redirect::route('ingresos.index')->with('success', 'Ingreso creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Ingreso $ingreso)
    {

        $usuarios = User::find($ingreso->user_id);
        $proveedor = Persona::find($ingreso->persona_id);

        foreach ($ingreso->productos as $ing) {
        }
        return Inertia::render('Ingreso/Show', ['ingresos' => $ingreso, 'proveedores' => $proveedor, 'usuario' => $usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return Redirect::route('ingresos.index')->with('success', 'Ingreso eliminado.');
    }
}

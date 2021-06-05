<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resoCliente
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorias = Categoria::paginate(2);
        $query = Persona::where('TipoPersona', '=', 'Proveedor');

        if (request('buscar')) {
            $query->where('Nombres', 'LIKE', '%' . request('buscar') . '%')->where('TipoPersona', '=', 'Proveedor');
        }

        return Inertia::render('Proveedor/List', ['proveedores' => $query->paginate(10)->withQueryString()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Proveedor/Form');
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
                'TipoPersona' => 'Required|max:50',
                'RazonSocial' => 'Nullable|max:100',
                'TipoDocumento' => 'Required|max:5',
                'NumeroDocumento' => 'Required|max:15',
                'Nombres' => 'Required|max:150',
                'Telefono' => 'Nullable|max:20',
                'Email' => 'Nullable|max:80',
                'Ciudad' => 'Nullable|max:100',
                'Calle' => 'Nullable|max:150',
                'Numero' => 'Nullable|max:5',

            ]
        );

        Persona::create($request->all());

        return Redirect::route('proveedores.index')->with('success', 'Proveedor creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $categCliente
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $proveedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $proveedore)
    {
        if ($proveedore->TipoPersona === 'Proveedor') {
            return Inertia::render('Proveedor/EditForm', ['proveedores' => "$proveedore"]);
        } else {
            return Redirect::route('proveedores.index')->with('success', 'Proveedor No existe.');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $proveedore)
    {
        $request->validate(
            [
                'TipoPersona' => 'Required|max:50',
                'RazonSocial' => 'Nullable|max:100',
                'TipoDocumento' => 'Required|max:5',
                'NumeroDocumento' => 'Required|max:15',
                'Nombres' => 'Required|max:150',
                'Telefono' => 'Nullable|max:20',
                'Email' => 'Nullable|max:80',
                'Ciudad' => 'Nullable|max:100',
                'Calle' => 'Nullable|max:150',
                'Numero' => 'Nullable|max:5',
            ]
        );
        $proveedore->update($request->all());

        return Redirect::route('proveedores.index')->with('success', 'Proveedor editado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $proveedore)
    {
        if ($proveedore->TipoPersona === 'Proveedor') {
          
            $proveedore->delete();
            return Redirect::route('proveedores.index')->with('success', 'Proveedor eliminado.');

        } else {
            
            return Redirect::route('proveedores.index')->with('success', 'Proveedor No existe.');

        }

    }
}

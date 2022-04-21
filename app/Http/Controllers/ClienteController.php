<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resoCliente
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorias = Categoria::paginate(2);
        $query = Persona::where('TipoPersona', '=', 'Cliente')->orderBy('Nombres');;

        if (request('buscar')) {
            $query->where('Nombres', 'LIKE', '%' . request('buscar') . '%')->where('TipoPersona', '=', 'Cliente');
        }

        return Inertia::render('Cliente/List', ['clientes' => $query->paginate(10)->withQueryString()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Cliente/Form');
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

        return Redirect::route('clientes.index')->with('success', 'Cliente creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $categCliente
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $cliente)
    {
       
        if ($cliente->TipoPersona === 'Cliente') {
   return Inertia::render('Cliente/EditForm', ['clientes' => "$cliente"]);

} else {
    return Redirect::route('clientes.index')->with('success', 'El cliente no existe.');

}

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\persona  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $cliente)
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
        $cliente->update($request->all());

        return Redirect::route('clientes.index')->with('success', 'Cliente editada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $cliente)
    {
       
        if ($cliente->TipoPersona === 'Cliente') {

            $cliente->delete();
            return Redirect::route('clientes.index')->with('success', 'Cliente eliminado.');

        } else {

            return Redirect::route('clientes.index')->with('success', 'El cliente  no el existe.');

        }

    }
}

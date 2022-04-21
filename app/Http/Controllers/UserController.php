<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = User::query()->orderBy('Role');;

        if (request('buscar')) {
            $query->where('name', 'LIKE', '%' . request('buscar') . '%');
        }

        return Inertia::render('User/List', ['usuarios' => $query->paginate(10)->withQueryString()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                return Inertia::render('User/Form');
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
                'name' => 'Required|max:255',
                'email' => 'Required|email|unique:users,email|max:255',
                'NumeroDocumento' => 'Required|max:8',
                 'Telefono'=> 'Nullable|max:11',
                'Ciudad'=> 'Nullable|max:255',
                'Calle'=> 'Nullable|max:255',
                'Numero'=> 'Nullable|max:6',
                'Role'=> 'Required|max:50', 
                'password' => 'Required|confirmed|min:6', 
                'password_confirmation' => 'min:6'

            ]
        );
       
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'NumeroDocumento'=> $request->NumeroDocumento,
                'Telefono'=> $request->Telefono,
                'Ciudad'=> $request->Ciudad,
                'Calle'=> $request->Calle,
                'Numero'=> $request->Numero,
                'Role'=> $request->Role,  
            'password' => Hash::make($request->password),
        ]);
        return Redirect::route( 'usuarios.index' )->with( 'success', 'Usuario creado.' ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {

        return Inertia::render('User/EditForm', ['usuarios' => "$usuario"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate(
            [
                'name' => 'Required',
                'email' => 'Required|email',
                'NumeroDocumento'=> 'Required',
                'Telefono'=> 'Nullable',
                'Ciudad'=> 'Nullable',
                'Calle'=> 'Nullable',
                'Numero'=> 'Nullable',
                'Role'=> 'Required',   
            ]
        );

        $usuario->update($request->all());
        return Redirect::route('usuarios.index')->with('success', 'Usuario editado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
     
      if($usuario->profile_photo_path != null){
        
     Storage::disk('public')->delete($usuario->profile_photo_path);
      }
      
    $usuario->delete();
     return Redirect::route('usuarios.index')->with('success', 'Usuario eliminado.');
    }
}

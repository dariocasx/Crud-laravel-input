<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Cliente;
use App\Grupo;
use Purifier;
use DB;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function index(Request $request)
    {
        //Obtengo objeto del cliente con relacion al indice de grupo
        $clientes = Cliente::with('grupos')->orderBy('id', 'desc')->get();
        //obtengo objeto del grupo ordenado en decreciente
        $grupos = Grupo::orderBy('id', 'desc')->get();

        return view('clientes.index')->withCliente($clientes)->withGrupo($grupos);
        //retorno la vista con valores del client y grupo
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //muestra en json
    
    public function show($id)
    {
        //Busqueda del cliente por medio del id
        $list = Cliente::find($id);

        //json para mostrar datos del cliente
        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'nombre' => $list->nombre,
            'apellido' => $list->apellido,
            'email' => $list->email,
            'grupo_id' => $list->grupo_id,
            'observaciones' => $list->observaciones,

        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Para la validacion de la edicion
    
    public function edit($id)
    {
        //Busqueda del cliente por medio del id
        $list = Cliente::find($id);
      
        $list_grupo = Grupo::find($list->grupo_id);
        //json para la edicion
        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'nombre' => $list_grupo->nombre_grupo,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Actualizar en la tabla
    
    public function update(Request $request, $id)
    {
        //Busqueda del cliente por medio del id
        $list = Cliente::find($id);
        //valido el campo nombre
        Validator::make($request->all(), [
            'nombre' => 'required|max:255',
        ])->validate();
        //obtengo valor de la peticion
        $list->grupo_id = $request->nombre;
        //metodo para guardar
        $list->save();
        //json para la actualizacion
        return response()->json([
            'status' => 'success',
            'msg' => 'El cliente fue actualizado'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo para eliminar
   
    public function destroy($id)
    {
        //Busqueda del cliente por medio del id
        $list = Cliente::find($id);

        //elimino por medio del id obtenido
        $list->delete();

        //json para la correcta eliminacion
        return response()->json([
            'status' => 'success',
            'msg' => 'El cliente ha sido eliminado'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Importante para las tablas
    
    public function getTable()
    {
        //Obtengo objeto del cliente con relacion al indice de grupo
        $clientes = Cliente::orderBy('id', 'desc')->get();
        //devuelvo la vista de la tabla con los valores
        return view('clientes.table')->withCliente($clientes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Funcion del controlador para almacenar
    
    public function store(Request $request)
    {   //valido los campos de guardar nuevo cliente
        Validator::make($request->all(), [
            'nombre' => 'required|max:20|min:3',
            'apellido' => 'required|max:20|min:3',
            'grupo' => 'required',
            'observaciones' => 'required|max:200',
            'email' => 'required|string|email|max:255',
        ])->validate();
        //obtengo el objeto cliente
        $list = new Cliente();
        //guardo los valores que obtengo por el modal
        $list->nombre = $request->nombre;
        $list->apellido = $request->apellido;
        $list->grupo_id = $request->grupo;
        $list->email = $request->email;
        $list->observaciones = $request->observaciones;

        //metodo para guardar
        $list->save();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'El nuevo cliente fue guardado'
        ]);
    }
}

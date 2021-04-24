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

        $clientes = Cliente::with('grupos')->orderBy('id', 'desc')->get();
        $grupos = Grupo::orderBy('id', 'desc')->get();


        return view('clientes.index')->withCliente($clientes)->withGrupo($grupos);
        //retornas por ejemplo,una vista
       
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
        $list = Cliente::find($id);
        //$list = Cliente::orderBy('id','DESC')->where('id',$id);

        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'nombre' => $list->nombre,
            'apellido' => $list->apellido,
            'grupo_id' => $list->grupo_id,

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
        $list = Grupo::find($id);
        
        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'nombre' => $list->nombre_grupo,
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
        $list = Cliente::find($id);

        Validator::make($request->all(), [
            'nombre' => 'required|max:255',
        ])->validate();

        $list->grupo_id = $request->nombre;

        $list->save();
        
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
        $list = Cliente::find($id);

        $list->delete();

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
        $clientes = Cliente::orderBy('id', 'desc')->get();
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
    {   
        Validator::make($request->all(), [
            'nombre' => 'required|max:200',
            'apellido' => 'required',
            'grupo' => 'required',
            'observaciones' => 'required',
            'email' => 'required|string|email|max:255',
       

        ])->validate();

        $list = new Cliente();

        $list->nombre = $request->nombre;
        $list->apellido = $request->apellido;
        $list->grupo_id = $request->grupo;
        $list->email = $request->email;
        $list->observaciones = $request->observaciones;

        $list->save();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'El nuevo cliente fue guardado'
        ]);
    }

   
}

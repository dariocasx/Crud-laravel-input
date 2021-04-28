<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Grupo;
use Purifier;

class GrupoController extends Controller
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
    public function index(Request $request)
    {
        //Obtengo objeto del grupo ordenado en decreciente
        $grupos = Grupo::orderBy('id', 'desc')->get();
        //retorno la vista de grupos y envio de datos
        return view('grupos.index')->withGrupo($grupos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTable()
    {
        //Obtengo objeto del grupo ordenado en decreciente
        $grupos = Grupo::orderBy('id', 'desc')->get();
        //retorno la vista de la tabla enviando datos
        return view('grupos.table')->withGrupo($grupos);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //valido los campos de guardar nuevo grupo
        Validator::make($request->all(), [
            'nombre_grupo' => 'required|max:20|min:3',
        ])->validate();
        //obtengo el objeto grupo
        $list = new Grupo();
        //guardo los valores que obtengo por el modal
        $list->nombre_grupo = $request->nombre_grupo;
        //metodo para guardar
        $list->save();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'El grupo se guardo correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Busqueda del cliente por medio del id
        $list = Grupo::find($id);

        //json para mostrar datos del grupo
        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'nombre_grupo' => $list->nombre_grupo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Busqueda del grupo por medio del id
        $list = Grupo::find($id);
        //json para la edicion
        return response()->json([
            'status' => 'success',
            'id' => $list->id,
            'nombre' => $list->nombre_grupo
        ]);
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
        //Busqueda del cliente por medio del id
        $list = Grupo::find($id);
        //valido el campo nombre
        Validator::make($request->all(), [
            'nombre_grupo' => 'required|max:20|min:3',
        ])->validate();
        //obtengo valor de la peticion
        $list->nombre_grupo = $request->nombre_grupo;
        //metodo para guardar
        $list->save();
        //json para la actualizacion
        return response()->json([
            'status' => 'success',
            'msg' => 'El grupo fue actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Busqueda del cliente por medio del id
        $list = Grupo::find($id);
        //elimino por medio del id obtenido
        $list->delete();
        //json para la correcta eliminacion
        return response()->json([
            'status' => 'success',
            'msg' => 'El grupo ha sido eliminado'
        ]);
    }
}

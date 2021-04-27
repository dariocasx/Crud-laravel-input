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


        $grupos = Grupo::orderBy('id', 'desc')->get();
        return view('grupos.index')->withGrupo($grupos);


       //retorno la vista de grupos y envio de datos
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTable()
    {
        $grupos = Grupo::orderBy('id', 'desc')->get();
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
        Validator::make($request->all(), [
            'nombre_grupo' => 'required|max:20|min:3',
        ])->validate();

        $list = new Grupo();

        $list->nombre_grupo = $request->nombre_grupo;


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
        $list = Grupo::find($id);

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
        $list = Grupo::find($id);
        
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
        $list = Grupo::find($id);

        Validator::make($request->all(), [
            'nombre_grupo' => 'required|max:20|min:3',
        ])->validate();

        $list->nombre_grupo = $request->nombre_grupo;


        $list->save();
        
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
        $list = Grupo::find($id);

        $list->delete();

        return response()->json([
            'status' => 'success',
            'msg' => 'El grupo ha sido eliminado'
        ]);
    }
}

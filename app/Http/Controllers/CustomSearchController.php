<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Grupo;
use App\CustomSearch;

use Purifier;

class CustomSearchController extends Controller
{
   

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

	 if($request->ajax())
     {
	      $output = '';
	      $query = $request->get('query');
	      $select = $request->get('select');
	      if($query != '')
	      {
	       if ($select=="select"){
	      	$data = Cliente::orderBy('id','DESC')
	         ->where('grupo_id', 'like', '%'.$query.'%')
	         ->orderBy('id', 'desc')
	         ->get();

	      }elseif($select==""){
	      	$data = Cliente::orderBy('id','DESC')
	         ->where('nombre', 'like', '%'.$query.'%')
	         ->orWhere('apellido', 'like', '%'.$query.'%')
	         ->orWhere('email', 'like', '%'.$query.'%')
	         ->get();
	      }else{
	      	$data = grupo::orderBy('id','DESC')
	         ->where('nombre_grupo', 'like', '%'.$query.'%')
	         ->orderBy('id', 'desc')
	         ->get();
	      }
         
      }
      else
      {
	       $data = DB::table('clientes')
	         ->orderBy('id', 'desc')
	         ->get();
      }
      		$total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
	    if ($select!="grupos"){    
	        $output .= '
	        <tr>
	         <td class="text-center">'.$row->id.'</td>
	         <td class="text-center">'.$row->nombre.'</td>
	         <td class="text-center">'.$row->apellido.'</td>
	         <td class="text-center">'.$row->email.'</td>
	         <td class="text-center">'.$row->grupos->nombre_grupo.'</td>
	         <td class="text-center col-xs-1">
									<button type="button" value="'.$row->id.'" class="btn btn-primary btn-block btn-sm edit-btn" data-toggle="modal" data-target="#edit-item">
									Editar Item
									</button>
								</td>
								<td class="text-center col-xs-1">
									<button type="button" value="'.$row->id.'" class="btn btn-danger btn-block btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item">
									Borrar Item
									</button>
								</td>
	        </tr>
	        ';
	    }else{
	    	$output .= '
	        <tr>
	         <td class="text-center">'.$row->id.'</td>
	         <td class="text-center">'.$row->nombre_grupo.'</td>
	         <td class="text-center col-xs-1">
									<button type="button" value="'.$row->id.'" class="btn btn-primary btn-block btn-sm edit-btn" data-toggle="modal" data-target="#edit-item2">
									Editar Item
									</button>
								</td>
								<td class="text-center col-xs-1">
									<button type="button" value="'.$row->id.'" class="btn btn-danger btn-block btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item2">
									Borrar Item
									</button>
								</td>
	        </tr>
	        ';
	    }    
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
	       // return view('search.index');

    }

    public function store(Request $request)
    {   
        $list="dadas";
        
        $view = view('customsearch', compact('list'))->render();
        return response()->json($view);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Grupo;
use App\CustomSearch;

use Purifier;
//request get para las busquedas por input y select desde el layout cliente y grupo
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
									<button type="button" value="'.$row->id.'" class="edit-btn" data-toggle="modal" data-target="#edit-item">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
									</button>
								</td>
								<td class="text-center col-xs-1">
									<button type="button" value="'.$row->id.'" class="remove-btn" data-toggle="modal" data-target="#destroy-item">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 13v6c0 .552-.448 1-1 1s-1-.448-1-1v-6c0-.552.448-1 1-1s1 .448 1 1zm7-1c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm4.333-8.623c-.882-.184-1.373-1.409-1.189-2.291l-5.203-1.086c-.184.883-1.123 1.81-2.004 1.625l-5.528-1.099-.409 1.958 19.591 4.099.409-1.958-5.667-1.248zm4.667 4.623v16h-18v-16h18zm-2 14v-12h-14v12h14z"/></svg>
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
									<button type="button" value="'.$row->id.'" class="edit-btn" data-toggle="modal" data-target="#edit-item2">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
									</button>
								</td>
								<td class="text-center col-xs-1">
									<button type="button" value="'.$row->id.'" class="btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item2">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 13v6c0 .552-.448 1-1 1s-1-.448-1-1v-6c0-.552.448-1 1-1s1 .448 1 1zm7-1c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm4.333-8.623c-.882-.184-1.373-1.409-1.189-2.291l-5.203-1.086c-.184.883-1.123 1.81-2.004 1.625l-5.528-1.099-.409 1.958 19.591 4.099.409-1.958-5.667-1.248zm4.667 4.623v16h-18v-16h18zm-2 14v-12h-14v12h14z"/></svg>
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
	        <td align="center" colspan="5">No hay datos</td>
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


}

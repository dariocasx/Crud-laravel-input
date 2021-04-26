<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LayoutController extends Controller
{
    function index(Request $request)
    {

        return view('layout.index');
        //Retorno de la vista del home
       
    }
}

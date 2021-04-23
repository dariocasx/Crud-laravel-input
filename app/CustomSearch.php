<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomSearch extends Model
{
   protected $fillable = ['nombre', 'apellido', 'email'];

	protected $table = 'clientes';
}

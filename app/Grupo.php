<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $dates = ['created_at', 'updated_at'];

	protected $fillable = ['nombre'];

	protected $table = 'grupos';

	public function clientes()
	{
	    return $this->hasMany(Cliente::class);
	}

	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Cliente extends Model
{
	protected $dates = ['created_at', 'updated_at'];

	protected $fillable = ['nombre', 'apellido', 'grupo_id'];

	protected $table = 'clientes';
	
	public function grupos()
	{
	   return $this->belongsTo(Grupo::class, 'grupo_id');
	}//llave foranea importante para la obtencion del id del grupo
}


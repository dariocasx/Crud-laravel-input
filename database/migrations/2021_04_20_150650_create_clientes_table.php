<?php

use  Illuminate\Support\Facades\Schema;
use  Illuminate\Database\Schema\Blueprint;
use  Illuminate\Database\Migrations\Migration;

class  CreateClientesTable  extends  Migration{

/**

* Run the migrations.

*

* @return void

*/

public  function up(){

    Schema::create('clientes',  function  (Blueprint $table)  {
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('email');
        $table->integer('grupo_de_cliente');
        $table->text('observaciones');
        $table->timestamps();
    });

}

/**

* Reverse the migrations.

*

* @return void

*/

public  function down(){
    Schema::dropIfExists('clientes');

}
}
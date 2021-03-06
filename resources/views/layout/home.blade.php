<style type="text/css">
#global {
	height: 700px;

	padding-left: 20px;

	border: 1px solid #ddd;
	background: #f1f1f1;
	overflow-y: scroll;
}
</style>
<pre id="global">
SPA Ajax con jQuery
laravel 7.4
Php 7.2
Bootstrap 3.3.7

El SPA se compone por un layout principal donde recibe los request de jQuery.

Los menus son los siguientes.
Layout Cliente
Layout Grupo

Controladores:
ClienteController (Crud de cliente + index)
GrupoController (Crud de grupo + index)
CustomSearchController (Se realizan los request de las busquedas
por input y select con metodo GET)
LayoutController (Aca solo se visualiza el home)

Modelos:
Grupo y cliente con el ORM de Eloquent.

Rutas:
Clientes y grupo para request del crud.
Tablas con datos de columna y filas de cliente y grupo.
CustomSearch para las busquedas.

Sql:
MariaDB con 1 tabla de cliente y otra de grupo con clave foranea
en indice "grupo_id" en cliente y en grupo como "nombre_grupo".

Javascript:
edit.js nos permite capturar el id para el modal.
destroy.js nos permite abrir el modal y eliminar por el id.
store.js request post para agregar un nuevo registro en la tabla.
show.js request post para mostrar el cliente.
uptate.js nos permite actualizar un registro.

Aclaración: se uso el show para mostrar el modal cliente con sus datos 
completos, ya que en la tabla se cortan los strings para que sea 
responsive y su visualización sea correcta en la interfaz.





Developed by Castelli Dario.



</pre>

@if (count($cliente) > 0)<!-- Si no tiene filas no muestra la tabla -->
	<table id="task" class="table table-responsive">
		<thead>
			<th class="text-center">Id</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Apellido</th>
			<th class="text-center">Email</th>
			<th class="text-center">Grupo</th>
		</thead>
		<tbody>
			@foreach($cliente as $list)
				<tr><!--cortamos las cadenas de ser mas de 7 caracteres y agregamos puntos suspensivos-->
					<td class="text-center">{{ $list->id }}</td>
					<td class="text-center">{{ substr($list->nombre, 0, 7) }} {{ strlen($list->nombre) > 7 ? '...': '' }}</td>
					<td class="text-center">{{ substr($list->apellido, 0, 7) }} {{ strlen($list->apellido) > 7 ? '...': '' }}</td>
					<td class="text-center">{{ substr($list->email, 0, 7) }} {{ strlen($list->email) > 7 ? '...': '' }}</td>
					<td class="text-center">{{ substr($list->grupos->nombre_grupo, 0, 10) }} {{ strlen($list->grupos->nombre_grupo) > 10 ? '...': '' }}</td>
					<td class="text-center col-xs-1" style="padding-right: 1px">
						<button type="button" value="{{ $list->id }}" class="edit-btn" data-toggle="modal" data-target="#edit-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
						</button>
					</td>
					<td class="text-center col-xs-1" style="padding-right: 1px">
						<button type="button" value="{{ $list->id }}" class="show-btn" data-toggle="modal" data-target="#show-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.21 0-4 1.791-4 4s1.79 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zm-.004 3.999c-.564.564-1.479.564-2.044 0s-.565-1.48 0-2.044c.564-.564 1.479-.564 2.044 0s.565 1.479 0 2.044z"/></svg>
						</button>
					</td>
					<td class="text-center col-xs-1" style="padding-right: 1px">
						<button type="button" value="{{ $list->id }}" class="remove-btn" data-toggle="modal" data-target="#destroy-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 13v6c0 .552-.448 1-1 1s-1-.448-1-1v-6c0-.552.448-1 1-1s1 .448 1 1zm7-1c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm4.333-8.623c-.882-.184-1.373-1.409-1.189-2.291l-5.203-1.086c-.184.883-1.123 1.81-2.004 1.625l-5.528-1.099-.409 1.958 19.591 4.099.409-1.958-5.667-1.248zm4.667 4.623v16h-18v-16h18zm-2 14v-12h-14v12h14z"/></svg>
						</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else<!--En caso contrario da un mensaje que no hay clientes -->
	<hr>
	<div class="no-items">
		<div class="no-items-wrapper">
			<h1 class="text-center cup">☕️</h1>
			<h4 class="text-center">No tiene clientes, puede descansar y tomar un cafe</h4>
		</div>
	</div>
@endif




		
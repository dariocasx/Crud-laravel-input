		@if (count($cliente) > 0)
			<table id="task" class="table table-striped">
				<thead>
					<th class="text-center">Id</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Apellido</th>
					<th class="text-center">Email</th>
					<th class="text-center">Grupo</th>
				</thead>
				<tbody>
					@foreach($cliente as $list)
						<tr>
							<td class="text-center">{{ $list->id }}</td>
							<td class="text-center">{{ substr($list->nombre, 0, 60) }} {{ strlen($list->nombre) > 60 ? '...': '' }}</td>
							<td class="text-center">{{ substr($list->apellido, 0, 60) }} {{ strlen($list->apellido) > 60 ? '...': '' }}</td>
							<td class="text-center">{{ substr($list->email, 0, 60) }} {{ strlen($list->email) > 60 ? '...': '' }}</td>
							<td class="text-center">{{ substr($list->grupos->nombre_grupo, 0, 60) }} {{ strlen($list->nombre_grupo) > 60 ? '...': '' }}</td>
							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="edit-btn" data-toggle="modal" data-target="#edit-item">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
								</button>
							</td>
							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="remove-btn" data-toggle="modal" data-target="#destroy-item">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 13v6c0 .552-.448 1-1 1s-1-.448-1-1v-6c0-.552.448-1 1-1s1 .448 1 1zm7-1c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm4.333-8.623c-.882-.184-1.373-1.409-1.189-2.291l-5.203-1.086c-.184.883-1.123 1.81-2.004 1.625l-5.528-1.099-.409 1.958 19.591 4.099.409-1.958-5.667-1.248zm4.667 4.623v16h-18v-16h18zm-2 14v-12h-14v12h14z"/></svg>
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
	    	<hr>
	    	<div class="no-items">
				<div class="no-items-wrapper">
					<h1 class="text-center cup">☕️</h1>
					<h4 class="text-center">No tiene clientes, puede descansar y tomar un cafe</h4>
				</div>
			</div>
		@endif




		
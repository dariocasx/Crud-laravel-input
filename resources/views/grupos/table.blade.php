		@if (count($grupo) > 0)
			<table class="table table-striped">
				<thead>
					<th class="text-center">#</th>
					<th class="text-center">Nombre del grupo</th>
					<th class="text-center"></th>
					<th class="text-center"></th>
				</thead>
				<tbody>
					@foreach($grupo as $list)
						<tr>
							<th class="text-center">{{ $list->id }}</th>
							<td class="text-center">{{ substr($list->nombre_grupo, 0, 60) }} {{ strlen($list->nombre_grupo) > 60 ? '...': '' }}</td>
							
							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="btn btn-primary btn-block btn-sm edit-btn" data-toggle="modal" data-target="#edit-item2">
								Editar item
								</button>
							</td>

							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="btn btn-danger btn-block btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item2">
								Borrar Item
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
					<h4 class="text-center">No tiene grupos, puede descansar y tomar un cafe</h4>
				</div>
			</div>
		@endif
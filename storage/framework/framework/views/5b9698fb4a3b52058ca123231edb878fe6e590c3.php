		<?php if(count($cliente) > 0): ?>
			<table id="task" class="table table-striped">
				<thead>
					<th class="text-center">Id</th>
					<th class="text-center">Nombre</th>

					<th class="text-center">Apellido</th>
					<th class="text-center">Email</th>
					<th class="text-center">Grupo</th>

					<th class="text-center"> </th>
					<th class="text-center"> </th>

				

				</thead>
				<tbody>
					<?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center"><?php echo e($list->id); ?></td>
							<td class="text-center"><?php echo e(substr($list->nombre, 0, 60)); ?> <?php echo e(strlen($list->nombre) > 60 ? '...': ''); ?></td>
							<td class="text-center"><?php echo e(substr($list->apellido, 0, 60)); ?> <?php echo e(strlen($list->apellido) > 60 ? '...': ''); ?></td>
							<td class="text-center"><?php echo e(substr($list->email, 0, 60)); ?> <?php echo e(strlen($list->email) > 60 ? '...': ''); ?></td>
							<td class="text-center"><?php echo e(substr($list->grupos->nombre_grupo, 0, 60)); ?> <?php echo e(strlen($list->nombre_grupo) > 60 ? '...': ''); ?></td>
							<td class="text-center col-xs-1">
								<button type="button" value="<?php echo e($list->id); ?>" class="btn btn-primary btn-block btn-sm edit-btn" data-toggle="modal" data-target="#edit-item">
								Editar Item
								</button>
							</td>
							<td class="text-center col-xs-1">
								<button type="button" value="<?php echo e($list->id); ?>" class="btn btn-danger btn-block btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item">
								Borrar Item
								</button>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		<?php else: ?>
	    	<hr>
	    	<div class="no-items">
				<div class="no-items-wrapper">
					<h1 class="text-center cup">☕️</h1>
					<h4 class="text-center">No tiene clientes, puede descansar y tomar un cafe</h4>
				</div>
			</div>
		<?php endif; ?>




		<?php /**PATH C:\laravel\clientes3\resources\views/clientes/table.blade.php ENDPATH**/ ?>
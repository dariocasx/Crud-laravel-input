		<?php if(count($cliente) > 0): ?>
			<table class="table table-striped">
				<thead>
					<th class="text-center">#</th>
					<th class="text-center">Title</th>
					<th class="text-center">Created At</th>
					<th class="text-center">Updated At</th>
					<th class="text-center"></th>
					<th class="text-center"></th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<th class="text-center"><?php echo e($list->id); ?></th>
							<td class="text-center"><?php echo e(substr($list->nombre, 0, 60)); ?> <?php echo e(strlen($list->nombre) > 60 ? '...': ''); ?></td>
							<td class="text-center col-xs-2"><?php echo e($list->created_at->diffForHumans()); ?></td>
							<?php if($list->updated_at->eq($list->created_at)): ?>
								<td class="text-center col-xs-2">---</td>
							<?php else: ?>
								<td class="text-center col-xs-2"><?php echo e($list->updated_at->diffForHumans()); ?></td>
							<?php endif; ?>
							<td class="text-center col-xs-1">
								<button type="button" value="<?php echo e($list->id); ?>" class="btn btn-primary btn-block btn-sm edit-btn" data-toggle="modal" data-target="#edit-item">
								Edit Item
								</button>
							</td>
							<td class="text-center col-xs-1">
								<button type="button" value="<?php echo e($list->id); ?>" class="btn btn-info btn-block btn-sm show-btn" data-toggle="modal" data-target="#show-item">
								View Item
								</button>
							</td>
							<td class="text-center col-xs-1">
								<button type="button" value="<?php echo e($list->id); ?>" class="btn btn-danger btn-block btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item">
								Delete Item
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
					<h4 class="text-center">Great, You have no thing to do. Just take a cub of tea</h4>
				</div>
			</div>
		<?php endif; ?><?php /**PATH C:\laravel\clientes\resources\views/clientes/table.blade.php ENDPATH**/ ?>
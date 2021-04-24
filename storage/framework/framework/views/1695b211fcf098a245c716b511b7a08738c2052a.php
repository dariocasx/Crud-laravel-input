<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="viewport" content="width=500">
	<title>Clientes</title>
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Open Sans:800', 'Nunito:600']
			}
		});
	</script>
	<link rel="stylesheet" href="<?php echo e(asset('css/app2.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">

</head>
<body>
	
	<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<main class="container">
		<div id="spa">
		 	<?php echo $__env->yieldContent('body'); ?>
		</div>
	</main>

	<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap-notify.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/refresh.js')); ?>"></script>
	<script src="<?php echo e(asset('js/store.js')); ?>"></script>
	<script src="<?php echo e(asset('js/edit.js')); ?>"></script>
	<script src="<?php echo e(asset('js/update.js')); ?>"></script>
	<script src="<?php echo e(asset('js/show.js')); ?>"></script>
	<script src="<?php echo e(asset('js/destroy.js')); ?>"></script>
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	
</body>


</html>

<script type="text/javascript">


    $("#spaGrupo").click(function() {
        $(spa).load("/grupos");
    });
    $("#spaCliente").click(function() {
        $(spa).load("/clientes");
    });


       
</script><?php /**PATH C:\laravel\clientes3\resources\views/app.blade.php ENDPATH**/ ?>
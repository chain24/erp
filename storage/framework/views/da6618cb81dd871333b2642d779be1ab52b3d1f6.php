

	<?php $__env->startSection('content'); ?>
	<div class="header_bar">
		<h1>Location</h1>
	</div>
	<div class="table-responsive">
		<div class="div_add">
			<button type="button" onclick="javascript:location.href='<?php echo e(url('/')); ?>/location/create'" class="btn btn-primary"><?php echo e(trans('names.add_location')); ?></button>
		</div>		

		<table class="table table-bordered table-hover table-responsive table-striped">
			

			<thread>
				<tr class="success">

					<th><?php echo e(trans('names.select')); ?></th>
					<th><?php echo e(trans('names.location')); ?></th>
					<th><?php echo e(trans('names.city')); ?></th>
					<th><?php echo e(trans('names.state')); ?></th>
					<th><?php echo e(trans('names.zipcode')); ?></th>
					<th><?php echo e(trans('names.location_phone')); ?></th>
					<th><?php echo e(trans('names.fax')); ?></th>
					<th ><?php echo e(trans('names.operate')); ?></th>

				</tr>
			</thread>
			<form action="/location/2" method="POST" onsubmit="return confirm('确定要删除?');">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('DELETE')); ?>

				<?php if($locations): ?>
				<?php foreach($locations as $val): ?>
				<tr class="success"><td><input id='arcID' class='np' type='checkbox' value='<?php echo e($val->location_id); ?>' name='arcID[]'/></td><td><?php echo e($val->location); ?></td><td><?php echo e($val->city); ?></a></td><td><?php echo e($val->state); ?></td><td><?php echo e($val->zipcode); ?></td><td><?php echo e($val->phone); ?></td><td><?php echo e($val->fax); ?><td><button type="button" onclick="location.href='<?php echo e(URL::route('location.edit',['id'=>$val->location_id])); ?>'" class="btn btn-primary"><?php echo e(trans('names.edit')); ?></button></tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</table>
			<div class="chang_button" align="left" style="margin-top:10px;" >          
				<button class="btn btn-danger"><?php echo e(trans('names.delete')); ?></button>
			</form>
		</div>
	</center>
	<?php echo $locations->links(); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php $__env->startSection('sidebar'); ?>
<li>
	<form class="search-form" method="GET" action="search-results.html">
		<div class="search-pane" style="position: relative;">
			<input type="text" placeholder="Search here..." name="search"
				style="width: 200px; padding-top: 2px; padding-bottom: 2px; margin-bottom: 4px;">

			<img
				style="position: absolute; left: 175px; top: 1px; cursor: pointer;"
				src="<?php echo e(url('/')); ?>/images/Image_01.jpg">

		</div>
	</form>
</li>



<li class="category_main" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #4299EA; border: solid 1px #fff; width: 200px">customer
	</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='<?php echo e(URL::route('customer.index')); ?>'"><?php echo e(trans('names.show_customer')); ?>

	</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='<?php echo e(URL::route('customer.create')); ?>'"><?php echo e(trans('names.add_customer')); ?>

	</button>
</li>
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>


<div class="header_bar">
	<h1>customer</h1>
</div>
<div class="table-responsive">
	<div class="div_add">
		<button type="button"
			onclick="javascript:location.href='<?php echo e(URL::route('customer.create')); ?>'"
			class="btn btn-primary"><?php echo e(trans('names.add_customer')); ?></button>
	</div>
	<form action="<?php echo e(URL::route('customer.destroy',['id'=>2])); ?>"
		method="POST" onsubmit="return confirm('确定要删除?');">
		<?php echo e(csrf_field()); ?> <?php echo e(method_field('DELETE')); ?>

		<table
			class="table table-bordered table-hover table-responsive table-striped">
			<thead>
				<tr>
					<th></th>
					<th>#</th>
					<th><?php echo e(trans('names.customer_name')); ?></th>
					<th><?php echo e(trans('names.phone')); ?></th>
					<th><?php echo e(trans('names.email')); ?></th>
					<th><?php echo e(trans('names.operate')); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if($customer): ?> <?php foreach($customer as $cate): ?>
				<tr>
					<td><input value='<?php echo e($cate->customer_id); ?>' name='arcID[]'
						type="checkbox"></td>
					<td><?php echo e($cate->customer_id); ?></td>
					<td><?php echo e($cate->customer); ?></td>
					<td><?php echo e($cate->contact_phone); ?></td>
					<td><?php echo e($cate->contact_email); ?></td>
					<td>

						<button type="button"
							onclick="location.href='<?php echo e(URL::route('customer.edit',['id'=>$cate->customer_id])); ?>'"
							class="btn btn-primary"><?php echo e(trans('names.edit')); ?></button>
						<button type="button" class="btn btn-primary"
						onclick="location.href='<?php echo e(URL::route('customer.show',['customer_id'=>$cate->customer_id])); ?>'"><?php echo e(trans('names.add')); ?></button>
					</td>
				</tr>
				<?php endforeach; ?> <?php endif; ?>
			</tbody>
		</table>
		<div>
			<div class="div_del float_left">
				<button type="submit" class="btn btn-danger"><?php echo e(trans('names.delete')); ?></button>
			</div>
	
	</form>
	<div class="div_add float_right"><?php echo $customer->render(); ?></div>
	<div class="clear"></div>
</div>

</div>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
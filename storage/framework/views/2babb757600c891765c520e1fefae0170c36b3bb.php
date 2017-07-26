

<?php $__env->startSection('content'); ?>
<div class="header_bar">
	<h1>Orders</h1>
</div>
<table class="table table-bordered table-hover table-responsive table-striped">

	
	<thread>
		<tr class="success">
			
			<th><?php echo e(trans('names.supplier')); ?></th>
			<th><?php echo e(trans('names.location')); ?></th>
			<th><?php echo e(trans('names.total')); ?></th>
			<th><?php echo e(trans('names.subtotal')); ?></th>
			<th><?php echo e(trans('names.tax')); ?></th>
			<th><?php echo e(trans('names.shippingType')); ?></th>
			<th><?php echo e(trans('names.payType')); ?></th>
			
		</tr>
	</thread>


	<?php if($orders): ?>
	<?php foreach($orders as $order): ?>
	<tr class="success">
		<td onclick="javascript:location.href='<?php echo e(url('/')); ?>/order/<?php echo e($order->pcs_order_id); ?>'"><?php echo e($order->supplier); ?></td><td><?php echo e($order->location); ?></td><td><?php echo e($order->total); ?></td><td><?php echo e($order->subtotal); ?></td><td><?php echo e($order->tax); ?></td><td><?php echo e($order->shippingType); ?></td><td><?php echo e($order->payType); ?></td>
	</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>
</center>
<?php echo $orders->links(); ?>		
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
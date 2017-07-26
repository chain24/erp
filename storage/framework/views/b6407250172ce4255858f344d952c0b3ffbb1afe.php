<?php $__env->startSection('content'); ?>


<div class="header_bar">
	<h1>product</h1>
     </div>
    <div class="table-responsive">
        <div class="div_add">
            <button type="button" onclick="javascript:location.href='<?php echo e(url('/')); ?>/product/create'" class="btn btn-primary"><?php echo e(trans('names.AddProduct')); ?></button>
        </div>

			<table class="table table-bordered table-hover table-responsive table-striped" >
			
	<thread>
		<tr class="success">
			<th><?php echo e(trans('names.select')); ?></th>
			<th><?php echo e(trans('names.sku')); ?></th>
			<th><?php echo e(trans('names.product_title')); ?></th>
			<th><?php echo e(trans('names.product_weight')); ?></th>
			<th><?php echo e(trans('names.primary_category')); ?></th>
			<th><?php echo e(trans('names.description')); ?></th>
			<th><?php echo e(trans('names.operate')); ?></th>
		</tr>
	</thread>
	<form action="/product/2" method="POST" onsubmit="return confirm('确定要删除?');">
 			<?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

	<?php if($products): ?>
	<?php foreach($products as $val): ?>
	<tr class="success">
	<td><input id='arcID' class='np' type='checkbox' value='<?php echo e($val->product_id); ?>' name='arcID[]'/></td>
	<td><?php echo e($val->sku); ?></td><td><?php echo e($val->title); ?></td><td><?php echo e($val->weight); ?></td><td><?php echo e($val->primary_category); ?></td><td><?php echo e($val->description); ?></td><td><button type="button" onclick="location.href='<?php echo e(URL::route('product.edit',['id'=>$val->product_id])); ?>'" class="btn btn-primary"><?php echo e(trans('names.edit')); ?></button></td></tr>
		 
          
	<?php endforeach; ?>
	<?php endif; ?>
	</table>
	<div class="chang_button" align="left" style="margin-top:10px;" >          
<button class="btn btn-danger "><?php echo e(trans('names.delete')); ?></button>
</form>

</div>
</center>		
</div>
<?php echo $products->links(); ?>


			
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
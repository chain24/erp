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
		style="background-color: #4299EA; border: solid 1px #fff; width: 200px">supplier</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='<?php echo e(url('/')); ?>/supplier'">show
		supplier</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='<?php echo e(url('/')); ?>/supplier/create'">add
		supplier</button>
</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="header_bar">
        <h1>Supplier</h1>
    </div>

			
			
		<div class="div_add">
            <button type="button" class="btn btn-primary" onclick="javascript:location.href='<?php echo e(url('/')); ?>/supplier/create'"><?php echo e(trans('names.add_supplier')); ?></button>
       	</div>
       	<form action="/supplier/2" method="POST" onsubmit="return confirm('确定要删除?');">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

    <table class="table table-bordered table-hover table-responsive table-striped" >  
	<thread>
		<tr class="success">
			<th >select</th>
			<th ><?php echo e(trans('names.supplier')); ?></th>
			<th ><?php echo e(trans('names.city')); ?></th>
			<th ><?php echo e(trans('names.state')); ?></th>
			<th ><?php echo e(trans('names.supplier_country')); ?></th>
			<th ><?php echo e(trans('names.zipcode')); ?></th>			
			<th ><?php echo e(trans('names.operate')); ?></th>
			<th><?php echo e(trans('names.add_to_order')); ?></th>
		</tr>
	</thread>
			 
	<?php if($suppliers): ?>
	<?php foreach($suppliers as $val): ?>
	<tr class="success">
	<td><input id='arcID' class='np' type='checkbox' value='<?php echo e($val->supplier_id); ?>' name='arcID[]'/></td>
	<td><?php echo e($val->supplier); ?></td><td><?php echo e($val->city); ?></td><td><?php echo e($val->state); ?></td><td><?php echo e($val->country); ?></td><td><?php echo e($val->zipcode); ?></td><td><button type="button" onclick="location.href='<?php echo e(URL::route('supplier.edit',['id'=>$val->supplier_id])); ?>'" class="btn btn-primary"><?php echo e(trans('names.edit')); ?></button>

           </td><td><button type="button" onclick="location.href='/supplier/<?php echo e($val->supplier_id); ?>'" class="btn btn-primary"><?php echo e(trans('names.add_to_order')); ?></button></td></tr>
	 <?php endforeach; ?>
	<?php endif; ?>
	</table>
	<div class="chang_button" align="left" style="margin-top:10px;" >          
<button class="btn btn-danger"><?php echo e(trans('names.delete')); ?></button>
</form>
</div>
</center>

</div>

<?php echo $suppliers->links(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
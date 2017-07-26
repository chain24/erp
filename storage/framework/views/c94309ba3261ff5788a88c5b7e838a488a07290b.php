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
		style="background-color: #4299EA; border: solid 1px #fff; width: 200px">category</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='<?php echo e(url('/')); ?>/category'">show
		category</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='<?php echo e(url('/')); ?>/category/create'">add
		category</button>
</li>
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>

<div class="header_bar"
	style="line-height: 24px; background-color: #F4F4F4; padding-left: 10px; color: #7F7F7F;">Category
	management</div>
<?php foreach($category as $category): ?>
<form class="form-horizontal" method="POST"
	action="<?php echo e(url('/')); ?>/category/<?php echo e($category->category_id); ?>">
	<?php echo e(csrf_field()); ?> <?php echo e(method_field('PUT')); ?>

	<div style="margin-top: 20px; font-family: 'Gautami';"
		class='form-group'>
		<label class="col-sm-2 control-label"
			style="font-size: 20px; color: #9F9F9F; font-weight: normal;"
			for="name">category name</label>
		<div class="col-sm-10">
			<input class="form-control" name="category_name" type="text"
				value="<?php echo e($category->category_name); ?>" id="category_name">
		</div>
	</div>
	<div style="margin-top: 20px; font-family: 'Gautami';"
		class='form-group'>
		<label class="col-sm-2 control-label"
			style="font-size: 20px; color: #9F9F9F; font-weight: normal;"
			for="name">category level</label>
		<div class="col-sm-10">
			<input class="form-control" name="level" type="text"
				value="<?php echo e($category->level); ?>" id="category_level">
		</div>
	</div>
	<div style="margin-top: 20px; font-family: 'Gautami';"
		class='form-group'>
		<label class="col-sm-2 control-label"
			style="font-size: 20px; color: #9F9F9F; font-weight: normal;"
			for="name">parent name</label>
		<div class="col-sm-10">
			<select class="form-control" id="parent_id" name="parent_id">
				<option value='0' selected="selected">root</option> 
				<?php foreach($categories as $cate): ?>
				<?php if($cate->category_id==$category->category_pid): ?>
				<option selected="selected" value='<?php echo e($cate->category_id); ?>'><?php echo e($cate->category_name); ?></option>
				<?php else: ?>
				<option value='<?php echo e($cate->category_id); ?>'><?php echo e($cate->category_name); ?></option>
				<?php endif; ?> <?php endforeach; ?>
			</select>
		</div>
	</div>
	<div style="margin-top: 20px; font-family: 'Gautami';"
		class='form-group'>
		<input style="width: 100px; padding: 0;"
			class="btn btn-primary form-control" type="submit" value="submit">
	</div>
</form>
<?php endforeach; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
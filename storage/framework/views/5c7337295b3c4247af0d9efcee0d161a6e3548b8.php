<?php $__env->startSection('sidebar'); ?>
<li>
<form class="search-form" method="GET" action="search-results.html">
	<div class="search-pane" style="position:relative;">
<input type="text" placeholder="Search here..." name="search" style="width:200px;padding-top:2px;padding-bottom:2px;margin-bottom:4px;">

<img style="position:absolute;left:175px;top:1px;cursor:pointer;"src="<?php echo e(url('/')); ?>/images/Image_01.jpg">
	
			</div>
		</form>
	</li>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F;">Make sure the order</div>
	<form class="form-horizontal" method="POST" action="<?php echo e(url('/')); ?>/order">
	<?php echo e(csrf_field()); ?>

    <table class="table" style="width: 45%;float: left;">
     	<thead>
     		<tr>
            <th colspan="2"><h2>Location</h2></th>
        </tr>
        </thead>
     	<tr>
   			<td>location name</td>
    		<td><?php echo e($location->location); ?><input class="form-control" name="location_name" type="hidden" value="<?php echo e($location->location); ?>" id="location_name"></td>
    	</tr>
    	<tbody>
        <tr>
            <td>addr1</td>
            <td><?php echo e($location->addr1); ?></td>
        </tr>
        <tr>
            <td>addr2</td>
            <td><?php echo e($location->addr2); ?></td>
        </tr>
        <tr>
            <td>city</td>
            <td><?php echo e($location->city); ?></td>
        </tr>
        <tr>
            <td>state</td>
            <td><?php echo e($location->state); ?></td>
        </tr>
        <tr>
            <td>country</td>
            <td><?php echo e($location->country); ?></td>
        </tr>
        <tr>
            <td>zip code</td>
            <td><?php echo e($location->zipcode); ?></td>
        </tr>
        <tr>
            <td>phone</td>
            <td><?php echo e($location->phone); ?></td>
        </tr>
        </tbody>
    	<tr>
    	</table>	
    		
    <table class="table" style="width: 45%;float: right;">
        <thead>
        <tr>
            <th colspan="2"><h2>Supplier</h2></th>
        </tr>
        </thead>
        <tr>
            <td width="20%">supplier name</td>
            <td><?php echo e($supplier->supplier); ?><input class="form-control" name="supplier_name" type="hidden" value="<?php echo e($supplier->supplier); ?>" id="supplier_name"></td>
        </tr>
        <tbody>
        <tr>
            <td>addr1</td>
            <td><?php echo e($supplier->addr1); ?></td>
        </tr>
        <tr>
            <td>addr2</td>
            <td><?php echo e($supplier->addr2); ?></td>
        </tr>
        <tr>
            <td>city</td>
            <td><?php echo e($supplier->city); ?></td>
        </tr>
        <tr>
            <td>state</td>
            <td><?php echo e($supplier->state); ?></td>
        </tr>
        <tr>
            <td>country</td>
            <td><?php echo e($supplier->country); ?></td>
        </tr>
        <tr>
            <td>zip code</td>
            <td><?php echo e($supplier->zipcode); ?></td>
        </tr>
        <tr>
            <td>contact phone</td>
            <td><?php echo e($supplier->contact_phone); ?></td>
        </tr>
        </tbody>
    </table>
    
        <table class="table table-bordered table-hover table-responsive table-striped">
        <thread>
        <tbody>	
		<tr >
			<th>sku</th>
			<th>product title</th>
			<th>price</th>
			<th>qty</th>
			<th>subtotal</th>
		</tr>
		<?php foreach($product as $val): ?>
		<tr>
	<td><?php echo e($val['sku']); ?><input type="hidden" value="<?php echo e($val['sku']); ?>" name="sku[]"></td><td><?php echo e($val['title']); ?><input type="hidden" value="<?php echo e($val['title']); ?>" name="title[]"></td><td><?php echo e($val['price']); ?><input class="form-control" type="hidden" name="product_price[]" value="<?php echo e($val['price']); ?>"></td><td><?php echo e($val['qty']); ?><input class="form-control" name="product_qty[]"  value="<?php echo e($val['qty']); ?>"  type="hidden"></td><td><?php echo e($val['price']*$val['qty']); ?></td></tr>
		<?php endforeach; ?>
	</thread>
	</tbody>
        </table>
		<div class="col-sm-offset-2 col-sm-10 btn_submit" class='form-group'>
		<span style="float: right;width:100px;height:30px;line-height:30px" class="label label-success">total:<?php echo e($total); ?></span>
			<input style="width:100px;padding:0;" class="btn btn-danger form-control" type="submit" value="submit order">
		
        </div>
	</form>
	

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
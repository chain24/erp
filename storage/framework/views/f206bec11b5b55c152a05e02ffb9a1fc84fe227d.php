



<?php $__env->startSection('content'); ?>

<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">order show</div>
    <?php if($supplier): ?>

            <table class="table" style="width: 50%;float:left">
                <thead>
                <tr>
                    <th align="center"><h2>Supplier</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right">supplier name:</td>
                    <td><?php echo e($supplier->supplier); ?></td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td width="20%" align="right">city:</td>
                    <td><?php echo e($supplier->city); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">state:</td>
                    <td><?php echo e($supplier->state); ?></td>
                </tr>
                <tr>
                    <td  width="20%" align="right">country:</td>
                    <td><?php echo e($supplier->country); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">zip code:</td>
                    <td><?php echo e($supplier->zipcode); ?></td>
                </tr>

                </tbody>
            </table>
            <table class="table" style="width: 45%;float: right;">
        <thead>
        <tr>
            <th colspan="2"><h2>Location</h2></th>
        </tr>
        </thead>
        <tr>
            <td width="20%">location name</td>
            <td><?php echo e($location->location); ?></td>
        </tr>
        <tbody>
        <tr>
            <td>addr1</td>
            <td><?php echo e($location->addr1); ?></td>
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
    </table>
    
    <h1>Order</h1>    
        
	<table class="table table-bordered table-hover table-responsive table-striped">
		
        
	<thread>
		<tr>
			<th>product sku</th>
            <th>product title</th>	
            <th>price</th>
            <th>qty</th>
            <th>subtotal</th>
            <th>Serial Numbers</th>			
		</tr>
	</thread>
<?php endif; ?>

	<?php if($orders): ?>
    
	
	<?php if($sku): ?>
	<?php foreach($sku as $k=>$v): ?>
	<tr><td><?php echo e($sku[$k]); ?></td><td><?php echo e($title[$k]); ?></td><td><?php echo e($price[$k]); ?></td><td><?php echo e($qty[$k]); ?></td><td><?php echo e($qty[$k]*$price[$k]); ?></td><td><!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Serial Numbers<span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo e(url('/')); ?>/sn/create">Add</a></li>
    <li><a href="<?php echo e(url('/')); ?>/sn">list</a></li>    
  </ul>
</div></td></tr>
	<?php endforeach; ?>
	<?php endif; ?>
	<?php endif; ?>
	</table>
	<?php if($messages): ?>
    <p class="text-success"><?php echo e(trans('messages.submit_order_success')); ?><?php echo e($orders->created_at); ?></p>
   <?php endif; ?>   
</center>
	
    <span style="float: right;width:100px;height:30px;line-height:30px" class="label label-success">total:<?php echo e($orders->total); ?><input class="form-control" type="hidden" name="product_total"/></span>
 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
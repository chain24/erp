
<?php $__env->startSection('content'); ?>
<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">SerialNumber show</div>
    
    <table  class="table table-bordered table-hover table-responsive table-striped">
            <caption></caption>
            <thread>
                <tr>
                    <th >Serial Number</th>
                    <th >movement Id</th>
                    <th >product Id</th>
                </tr>
            </thread>  
    <?php if($sns): ?>
	<?php foreach($sns as $sn): ?>
	<tr>
		<td><?php echo e($sn->sn); ?></td>
		<td><?php echo e($sn->movement_id); ?></td>
		<td><?php echo e($sn->product_id); ?></td>
	</tr> 
	<?php endforeach; ?>
    <?php endif; ?>        
    </table>             
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
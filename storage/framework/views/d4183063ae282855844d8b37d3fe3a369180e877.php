
<?php $__env->startSection('content'); ?>
<?php if(isset($Errors)): ?>
<span class="label label-danger"><?php echo e($Errors); ?></span>
<?php endif; ?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
       <div class="panel-heading">Create</div>  
       <div class="panel-body">
        <form method="POST" action="<?php echo e(url('/')); ?>/location">
          <?php echo e(csrf_field()); ?>

           
           <div class='form-group'>
            <label class="col-md-4 control-label">location</label>
            <div class="col-md-6">
               <p><input class="form-control" name="data[location]" type="text" id="location"></p>
            </div>        
         </div>
          
          
         <div class='form-group'>
          <label class="col-md-4 control-label">city</label>          
          <div class="col-md-6">
            <p><input class="form-control" name="data[city]" type="text" id="city"></p>
          </div>
        </div>
        </p>
        <div class='form-group'>
          <label class="col-md-4 control-label">state</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[state]" type="text" id="state"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">country</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[country]" type="text" id="country"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">zipcode</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[zipcode]" type="text" id="zipcode"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">phone</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[phone]" type="text" id="phone"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">fax</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[fax]" type="text" id="fax"></p>
          </div>
        </div>

        <div class='form-group'>
          <div class="col-md-6 col-md-offset-4" align="center">
           <button type="submit" class="btn btn-primary">submit</button> 
         </div>
       </div> 
     </form>
   </div>
 </div>
</div>
</div>
<?php $__env->stopSection(); ?>



		
	


<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
 <?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
<?php foreach($customer as $val): ?>
<form  method="POST" action="<?php echo e(url('/')); ?>/customer/<?php echo e($val->customer_id); ?>">
	<?php echo e(csrf_field()); ?>

    <?php echo e(method_field('PUT')); ?>


	<div class="form-group"> 
        	<label class="col-md-4 control-label">customer name</label> 
        	 <div class="col-md-6">         
            <p><input class="form-control "  name="date[customer]" type="text" value="<?php echo e($val->customer); ?>" id="customer" ></p>
        </div>
        </div>
	<div class="form-group"> 
		<label class="col-md-4 control-label">addr1</label> 
		<div class="col-md-6">         
			<p><input class="form-control "  name="date[addr1]" type="text" value="<?php echo e($val->addr1); ?>" id="addr1" ></p>
		</div>
	</div>

	<div class="form-group"> 
		<label class="col-md-4 control-label">addr2</label> 
		<div class="col-md-6">         
			<p><input class="form-control "  name="date[addr2]" type="text" value="<?php echo e($val->addr2); ?>" id="addr2" ></p>
		</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">city</label>
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[city]" type="text" value="<?php echo e($val->city); ?>" id="city" ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">state</label>
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[state]" type="text" value="<?php echo e($val->state); ?>" id="state"  ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">country</label>
		 <div class="col-md-6">		 
		<p><input class="form-control " name="date[country]" type="text" value="<?php echo e($val->country); ?>" id="country" ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">zipcode</label>
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[zipcode]" type="text" value="<?php echo e($val->zipcode); ?>" id="zipcode" ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">contact_title</label>
		 <div class="col-md-6">		 
		<p><input class="form-control " name="date[contact_title]" value="<?php echo e($val->zipcode); ?>" type="text" id="contact_title" ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">contact_name</label>	
		 <div class="col-md-6">	 
		<p><input class="form-control " name="date[contact_name]" type="text" value="<?php echo e($val->contact_name); ?>"  id="contact_name" ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">contact_phone</label>	
		 <div class="col-md-6">	 
		<p><input class="form-control " name="date[contact_phone]" type="text" value="<?php echo e($val->contact_phone); ?>"  id="contact_phone" ></p>
	</div>
	</div>
	<div class='form-group'>	
		<label class="col-md-4 control-label">contact_fax</label>
		 <div class="col-md-6">	
		</p><input class="form-control " name="date[contact_fax]" type="text" value="<?php echo e($val->contact_fax); ?>" id="contact_fax" ></p>
	</div>
	</div>
	<div class='form-group'>
		<label class="col-md-4 control-label">contact_email</label>	
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[contact_email]" type="text" value="<?php echo e($val->contact_email); ?>" id="contact_email" ></p>
	</div>
	</div>
	<div class='form-group'>
          <div class="col-md-6 col-md-offset-4" align="center">
           <button type="submit" class="btn btn-primary">submit</button> 
         </div>
       </div> 
</form>
<?php endforeach; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
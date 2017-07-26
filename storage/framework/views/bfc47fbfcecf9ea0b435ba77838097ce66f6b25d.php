 

 <?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>
                <div class="panel-body">
	<form  method="POST" action="<?php echo e(url('/')); ?>/supplier">
	<?php echo e(csrf_field()); ?>


        <div class="form-group"> 
        	<label class="col-md-4 control-label">supplier name</label> 
        	 <div class="col-md-6">         
            <p><input class="form-control "  name="date[supplier]" type="text" id="supplier" ></p>
        </div>
        </div>
	        

	<div class='form-group'>
		<label class="col-md-4 control-label">city</label>
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[city]" type="text" id="city" ></p>
	</div>
	</div>
	

	<div class='form-group'>
		<label class="col-md-4 control-label">state</label>
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[state]" type="text" id="state"  ></p>
	</div>
	</div>

	<div class='form-group'>
		<label class="col-md-4 control-label">country</label>
		 <div class="col-md-6">		 
		<p><input class="form-control " name="date[country]" type="text" id="country" ></p>
	</div>
	</div>
	
	<div class='form-group'>
		<label class="col-md-4 control-label">zipcode</label>
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[zipcode]" type="text" id="zipcode" ></p>
	</div>
	</div>
	
	<div class='form-group'>
		<label class="col-md-4 control-label">contact_title</label>
		 <div class="col-md-6">		 
		<p><input class="form-control " name="date[contact_title]" type="text" id="contact_title" ></p>
	</div>
	</div>
<div class='form-group'>
		<label class="col-md-4 control-label">contact_name</label>	
		 <div class="col-md-6">	 
		<p><input class="form-control " name="date[contact_name]" type="text" id="contact_name" ></p>
	</div>
	</div>

	<div class='form-group'>
		<label class="col-md-4 control-label">contact_phone</label>	
		 <div class="col-md-6">	 
		<p><input class="form-control " name="date[contact_phone]" type="text" id="contact_phone" ></p>
	</div>
	</div>

	<div class='form-group'>	
		<label class="col-md-4 control-label">contact_fax</label>
		 <div class="col-md-6">	
		</p><input class="form-control " name="date[contact_fax]" type="text" id="contact_fax" ></p>
	</div>
	</div>

	<div class='form-group'>
		<label class="col-md-4 control-label">contact_email</label>	
		 <div class="col-md-6">		
		<p><input class="form-control " name="date[contact_email]" type="text" id="contact_email" ></p>
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
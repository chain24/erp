<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                <?php foreach($product as $product): ?>	
				<form method="POST" action="<?php echo e(url('/')); ?>/product">
				<?php echo e(csrf_field()); ?>

				<div class='form-group'>
            <label class="col-md-4 control-label">product sku</label>
            <div class="col-md-6">
               <p><input class="form-control" name="data[sku]" value="<?php echo e($product->sku); ?>" type="text" id="sku"></p>
            </div>        
         </div>          
          
         <div class='form-group'>
          <label class="col-md-4 control-label">mfn</label>          
          <div class="col-md-6">
            <p><input class="form-control" name="data[mfn]" value="<?php echo e($product->mfn); ?>" type="text" id="mfn"></p>
          </div>
        </div>
        </p>
        <div class='form-group'>
          <label class="col-md-4 control-label">barcode</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[barcode]" value="<?php echo e($product->barcode); ?>" type="text" id="barcode"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">product title</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[title]" value="<?php echo e($product->title); ?>" type="text" id="title"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">maker</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[maker]" value="<?php echo e($product->maker); ?>" type="text" id="maker"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">product weight</label>
          <div class="col-md-6">
            <p><input class="form-control" name="data[weight]" value="<?php echo e($product->weight); ?>" type="text" id="weight"></p>
          </div>
        </div>
        <div class='form-group'>
          <label class="col-md-4 control-label">primary category</label>
          
          <div class="col-md-6">
          	<p><select id="category_id"
          		name="data[primary_category]"> <?php foreach($categories as $cate): ?>
          		<?php if($cate->category_id==$product->primary_category): ?>
          		<option selected="selected" value='<?php echo e($cate->category_id); ?>'><?php echo e($cate->category_name); ?></option>
          		<?php else: ?>
          		<option value='<?php echo e($cate->category_id); ?>'><?php echo e($cate->category_name); ?></option>
          		<?php endif; ?>
          		<?php endforeach; ?>
          	</select></p>
          </div>
        </div>

		<div class='form-group'>
          <label class="col-md-4 control-label">description</label>
          <div class="col-md-6">
            <p><textarea id="description" class="form-control" rows="10" cols="50"
				name="data[description]" style="height: 100px; vertical-align: top;"><?php echo e($product->description); ?></textarea></p>
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
 </div>
</div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
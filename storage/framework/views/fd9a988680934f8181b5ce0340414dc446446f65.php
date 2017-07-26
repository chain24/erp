


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(url('/')); ?>/location/<?php echo e($location->location_id); ?>">
                       <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('PUT')); ?>


                      <div class='form-group'>
                      <label class="col-md-4 control-label">location</label>
                      <div class="col-md-6">
                       <p><input class="form-control" value="<?php echo e($location->location); ?>" name="data[location]" type="text" id="location"/></p>
                     </div>
                     </div>

                     <div class='form-group'>
                      <label class="col-md-4 control-label">city</label>
                      <div class="col-md-6">
                      <p><input class="form-control" value="<?php echo e($location->city); ?>" name="data[city]" type="text" id="city"></p>
                    </div>
                    </div>

                    <div class='form-group'>
                      <label class="col-md-4 control-label">state</label>
                      <div class="col-md-6">
                      <p><input class="form-control" value="<?php echo e($location->state); ?>" name="data[state]" type="text" id="state"></p>
                    </div>
                    </div>

                    <div class='form-group'>
                      <label class="col-md-4 control-label">zipcode</label>
                      <div class="col-md-6">
                      <p><input class="form-control" value="<?php echo e($location->zipcode); ?>" name="data[zipcode]" type="text" id="state"></p>
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
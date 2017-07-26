
   
<?php $__env->startSection('content'); ?>

    <h1><?php echo e(trans('names.select_supplier')); ?></h1>
    <table class="table btn_table table-responsive" style="margin-bottom:0">

        <?php if($suppliers): ?>

            <table class="table" style="width: 50%;">
                <thead>
                <tr>
                    <th align="center"><h2>Supplier</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right">supplier name:</td>
                    <td><?php echo e($suppliers->supplier); ?></td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td width="20%" align="right">city:</td>
                    <td><?php echo e($suppliers->city); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">state:</td>
                    <td><?php echo e($suppliers->state); ?></td>
                </tr>
                <tr>
                    <td  width="20%" align="right">country:</td>
                    <td><?php echo e($suppliers->country); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">zip code:</td>
                    <td><?php echo e($suppliers->zipcode); ?></td>
                </tr>

                </tbody>
            </table>

        <?php endif; ?>

        <div class="header_bar">
        <h1>Location</h1>
    </div>
        <table class="table btn_table table-responsive">


            <thread>
                <tr >                    
                    <th><?php echo e(trans('names.location')); ?></th>
                    <th><?php echo e(trans('names.city')); ?></th>
                    <th><?php echo e(trans('names.state')); ?></th>
                    <th><?php echo e(trans('names.zipcode')); ?></th>
                    <th><?php echo e(trans('names.location_phone')); ?></th>
                    <th><?php echo e(trans('names.fax')); ?></th>
                    <th ><?php echo e(trans('names.operate')); ?></th>
                </tr>
            </thread>
            <?php if($locations): ?>
                <?php foreach($locations as $val): ?>
                    <tr>                        
                        <td><?php echo e($val->location); ?></td>
                        <td><?php echo e($val->city); ?></a></td>
                        <td><?php echo e($val->state); ?></td>
                        <td><?php echo e($val->zipcode); ?></td>
                        <td><?php echo e($val->phone); ?></td>
                        <td><?php echo e($val->fax); ?></td>
                    
                        <form action="/product/<?php echo e($val->location_id); ?>" method="get">
                            <?php echo e(csrf_field()); ?>

                            <?php if($supplier_id): ?>
                                <input type="hidden" value="<?php echo e($supplier_id); ?>" name="supplier_id">
                                <input type="hidden" value="<?php echo e($val->location_id); ?>" name="location_id">
                            <?php endif; ?>
                            <td>
                                <button  class="btn btn-primary  btn-sm"><?php echo e(trans('names.add_to_order')); ?></button>                                
                            </td>
                    </tr>        
                        </form>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        </center>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
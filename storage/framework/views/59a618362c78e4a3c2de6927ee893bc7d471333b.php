<?php $__env->startSection('content'); ?>

    <h1><?php echo e(trans('names.select_location')); ?></h1>
    <table class="table btn_table table-responsive" style="margin-bottom:0">

        <?php if($customer): ?>

            <table class="table" style="width: 50%;">
                <thead>
                <tr>
                    <th align="center"><h2>Customer</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right"><?php echo e(trans('names.customer_name')); ?>:</td>
                    <td><?php echo e($customer ->customer); ?></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="20%" align="right">addr1:</td>
                    <td><?php echo e($customer->addr1); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">addr2:</td>
                    <td><?php echo e($customer->addr2); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">city:</td>
                    <td><?php echo e($customer->city); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">state:</td>
                    <td><?php echo e($customer->state); ?></td>
                </tr>
                <tr>
                    <td  width="20%" align="right">country:</td>
                    <td><?php echo e($customer->country); ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">zip code:</td>
                    <td><?php echo e($customer->zipcode); ?></td>
                </tr>
                </tbody>
            </table>

        <?php endif; ?>

        <div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">
            location management
        </div>
        <table class="table btn_table table-responsive" style="margin-bottom:0">


            <thread>
                <tr bgcolor="#FBFCE2" style="color:white">

                    <th style="text-align:center;background-color:#368EE0">select</th>
                    <th style="text-align:center;background-color:#368EE0">location</th>
                    <th style="text-align:center;background-color:#368EE0">addr1</th>
                    <th style="text-align:center;background-color:#368EE0">addr2</th>
                    <th style="text-align:center;background-color:#368EE0">option</th>
                </tr>
            </thread>

            <?php if($locations): ?>
                <?php foreach($locations as $val): ?>

                    <tr bgcolor='#FFFFFF' align='center' style="background-color:#F4F4F4">
                        <td><input id='arcID' class='np' type='checkbox' value='<?php echo e($val->location_id); ?>' name='arcID[]'/>
                        </td>
                        <td><?php echo e($val->location); ?></td>
                        <td><?php echo e($val->addr1); ?></a></td>
                        <td><?php echo e($val->addr2); ?></td>

                        <form action="<?php echo e(URL::route('customer.product',['id'=>$val->location_id])); ?>" method="get">
                            <?php echo e(csrf_field()); ?>

                            <?php if($customer_id): ?>
                                <input type="hidden" value="<?php echo e($customer_id); ?>" name="customer_id">
                                <input type="hidden" value="<?php echo e($val->location_id); ?>" name="location_id">
                            <?php endif; ?>
                            <td>
                                <button class="btn btn-primary  btn-sm"
                                        style="background-color:#56AF45; border:solid 1px #fff;border-radius:4px;">add
                                </button>
                            </td>
                        </form>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        </center>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
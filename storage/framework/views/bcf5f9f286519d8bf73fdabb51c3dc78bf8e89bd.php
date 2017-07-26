<?php $__env->startSection('sidebar'); ?>
    <li>
        <form class="search-form" method="GET" action="search-results.html">
            <div class="search-pane" style="position:relative;">
                <input type="text" placeholder="Search here..." name="search"
                       style="width:200px;padding-top:2px;padding-bottom:2px;margin-bottom:4px;">

                <img style="position:absolute;left:175px;top:1px;cursor:pointer;"
                     src="<?php echo e(url('/')); ?>/images/Image_01.jpg">

            </div>
        </form>
    </li>



    <li class="category_main" style="border:0;padding:0;margin:0;">
        <button type="button" class="btn btn-primary "
                style="background-color:#4299EA;border:solid 1px #fff;width:200px">product
        </button>
    </li>

    <li class="category_sub" style="border:0;padding:0;margin:0;">
        <button type="button" class="btn btn-primary "
                style="background-color:#F4F4F4;border:solid 1px #fff;color:#6E6B6B;width:200px"
                onclick="javascript:location.href='<?php echo e(url('/')); ?>/product'">show product
        </button>
    </li>

    <li class="category_sub" style="border:0;padding:0;margin:0;">
        <button type="button" class="btn btn-primary "
                style="background-color:#F4F4F4 ;border:solid 1px #fff;color:#6E6B6B;width:200px"
                onclick="javascript:location.href='<?php echo e(url('/')); ?>/product/create'">add product
        </button>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">product
        management
    </div>
    <table class="table" style="width: 50%;float: left;">
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
    </table>
    <table class="table" style="width: 50%;float: right;">
        <thead>
        <tr>
            <th colspan="2"><h2>Supplier</h2></th>
        </tr>
        </thead>
        <tr>
            <td width="20%">supplier name</td>
            <td><?php echo e($supplier->supplier); ?></td>
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

    <h1>Product</h1>
    <div class="table-responsive">
     <div class="div_add">   
    <button data-toggle="modal"
            data-target="#myModal" type="button" class="btn btn-primary">add product
    </button>
</div>
    <form action="/order/create" method="GET">
        <table id="product_con" class="table btn_table table-responsive">
            <caption></caption>
            <thread>
                <tr>
                    <th >select</th>
                    <th >sku</th>
                    <th >title</th>
                    <th >price</th>
                    <th >qty</th>
                    <!--<th style="text-align:center;background-color:#368EE0">option</th>-->
                </tr>
            </thread>

            <?php echo e(csrf_field()); ?>

            <input type="hidden" name='location_id' value="<?php echo e($location->location_id); ?>">
            <input type="hidden" name='supplier_id' value="<?php echo e($supplier->supplier_id); ?>">
            
        </table>
        <div class="chang_button" align="left" style="margin-top:10px;">
            <center>
                <button class="btn btn-primary btn-sm"
                        style="background-color:#E63A3A; border:solid 1px #fff;border-radius:4px;">Preview
                </button>

            </center>
            <td><button class='btn btn-danger' onclick='del(" + data[i]['product_id'] + ")' style='background-color:#E63A3A; border:solid 1px #fff;border-radius:4px;'>del</button>
    </form>

    </div>
    </center>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        <select id="category" name="category">
                            <option>请选择</option>
                            <?php foreach($category as $cate): ?>
                                <option value='<?php echo e($cate->category_id); ?>'><?php echo e($cate->category_name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </h4>
                </div>
                <div class="modal-body">
                    <table id="modal_table" class="table btn_table table-responsive" style="margin-bottom:0">
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button onclick="addproduct()" type="button" class="btn btn-primary">
                        add product
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    </div>
    <?php echo $product->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extend-js'); ?>
    <script type="text/javascript">
        $("#category").change(function () {
            $.ajax({
                type: 'POST',
                url: '/ajax/create',
                data: {'category_id': $(this).val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                dataType: 'json',
                success: function (data) {
                    
                    var html = "";
                    for (var i = 0; i < data['length']; i++) {
                        html += "<tr bgcolor='#FFFFFF'  align='center' style='background-color:#F4F4F4'><td><input id='arcID' class='np' type='checkbox' value='" + data[i]['product_id'] + "' name='arcID[]'/></td><td>" + data[i]['sku'] + "</td><td>" + data[i]['title'] + "</a></td><td>" + data[i]['weight'] + "</td></tr>";
                    }
                    $("#modal_table").html(html);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status);
                    alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                }
            })
        });
        function addproduct() {
            var checkbox_val = new Array();
            $("#modal_table input:checkbox:checked").each(function (i) {
                checkbox_val[i] = $(this).val();
            })
            $.ajax({
                type: 'POST',
                url: '/ajax/create',
                data: {'product_id': checkbox_val},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                dataType: 'json',
                success: function (data) {
                    var html = "";
                    for (var i = 0; i < data['length']; i++) {
                        if (!$("#product_" + data[i]['product_id'])[0]) {
                            html += "<tr id='product_" + data[i]['product_id'] + "' bgcolor='#FFFFFF'  style='background-color:#F4F4F4'><td><input id='arcID' class='np' type='checkbox' value='" + data[i]['product_id'] + "' name='arcID[]'/><td"+data[i]['product_id']+"<input type='hidden' value='"+ data[i]['product_id']+"' name='product_id[]'</td><td>" + data[i]['sku'] + "<input type='hidden' value='" + data[i]['sku'] + "' name='sku[]'><td>" + data[i]['title'] + "<input type='hidden' value='" + data[i]['title'] + "' name='title[]'></td><td><input class='input-small' name='product_price[]' type='number'></td><td><input class='input-small' name='product_qty[]' type='number'></td></tr>";
                        }
                    }

                    $("#product_con").append(html);
                    $("#product_con input:checkbox").attr('checked','checked');

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status);
                    alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                },
            });
        }
        function del(id) {
            $("#product_" + id).remove();
        }
        <!--
 
        //-->
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
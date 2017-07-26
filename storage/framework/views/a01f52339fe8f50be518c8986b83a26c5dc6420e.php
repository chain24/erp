<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="_token" content="<?php echo e(csrf_token()); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Superbiiz ERP</title>

<!-- Bootstrap core CSS -->
<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Custom styles for this template -->
<style>
body {
	padding-top: 50px;
}

.starter-template {
	padding: 40px 15px;
	text-align: center;
}

.div_add {
	margin: 5px;
	text-align: right;
}

.div_del {
	margin: 5px;
}

.float_left {
	float: left;
}

.float_right {
	float: right;
}

.clear {
	clear: both;
}
</style>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <?php echo $__env->yieldContent('extend-head'); ?>
    <![endif]-->
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Superbiiz ERP</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav ">
					<?php /*
					<li class="active"><a href="#">Home</a></li>*/ ?> <?php /*
					<li><a href="#about">About</a></li>*/ ?> <?php /*
					<li><a href="#contact">Contact</a></li>*/ ?>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"> Category <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="category">
							<li><?php echo e(link_to_route('category.index','List')); ?></li>
							<li><?php echo e(link_to_route('category.create','Add Category')); ?></li>
						</ul></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"> Product <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="Product">
							<li><?php echo e(link_to_route('product.index','List')); ?></li>
							<li><?php echo e(link_to_route('product.create','Add Product')); ?></li>
						</ul></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"> Supplier <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="Supplier">
							<li><?php echo e(link_to_route('supplier.index','List')); ?></li>
							<li><?php echo e(link_to_route('supplier.create','Add Supplier')); ?></li>
						</ul></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"> Location <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="Location">
							<li><?php echo e(link_to_route('location.index','List')); ?></li>
							<li><?php echo e(link_to_route('location.create','Add Location')); ?></li>
						</ul></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"> Customer <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="Customer">
							<li><?php echo e(link_to_route('customer.index','List')); ?></li>
							<li><?php echo e(link_to_route('customer.create','Add Customer')); ?></li>
						</ul></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"> Order <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="Supplier">
							<li><?php echo e(link_to_route('order.index','Purchase')); ?></a></li>
							<li class="divider"></li>
							<li><a href="#">Sell</a></li>
						</ul></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>

	<div class="container-fluid">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php echo $__env->yieldContent('content'); ?></div>
	</div>
	<!-- /.container -->

	<!-- Bootstrap core JavaScript
================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="//cdn.bootcss.com/jquery/1.12.1/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<?php echo $__env->yieldContent('extend-js'); ?>
</body>
</html>


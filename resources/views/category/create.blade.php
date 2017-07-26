@extends('layout.master') @section('sidebar')
<li>
	<form class="search-form" method="GET" action="search-results.html">
		<div class="search-pane" style="position: relative;">
			<input type="text" placeholder="Search here..." name="search"
				style="width: 200px; padding-top: 2px; padding-bottom: 2px; margin-bottom: 4px;">

			<img
				style="position: absolute; left: 175px; top: 1px; cursor: pointer;"
				src="{{ url('/') }}/images/Image_01.jpg">

		</div>
	</form>
</li>



<li class="category_main" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #4299EA; border: solid 1px #fff; width: 200px">category</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='{{ url('/') }}/category'">show
		category</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='{{ url('/') }}/category/create'">add
		category</button>
</li>
@stop @section('content')

<div class="header_bar"
	style="line-height: 24px; background-color: #F4F4F4; padding-left: 10px; color: #7F7F7F;">Category
	management</div>

<form class="form-horizontal" method="POST"
	action="{{ url('/') }}/category">
	{{ csrf_field() }}

	<div style="margin-top: 20px; font-family: 'Gautami';"
		class='form-group'>
		<label class="col-sm-2 control-label"
			style="font-size: 20px; color: #9F9F9F; font-weight: normal;"
			for="name">category name</label>
		<div class="col-sm-10">
			<input class=" form-control" name="category_name" type="text"
				id="category_name">
		</div>
	</div>
	<div style="margin-top: 20px; font-family: 'Gautami';" id="parent_div"
		class='form-group'>
		<label class="col-sm-2 control-label"
			style="font-size: 20px; color: #9F9F9F; font-weight: normal;"
			for="name">parent name</label>
		<div class="col-sm-10">
			<select class="form-control" id="parent_id" name="parent_id">
				<option value='0'>root</option> 
				@foreach($categories as $cate)
				@if($cate->category_id==$category_id)
				<option selected="selected" value='{{$cate->category_id}}'>{{$cate->category_name}}</option>
				@else
				<option value='{{$cate->category_id}}'>{{$cate->category_name}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-sm-offset-2 col-sm-10 btn_submit" class='form-group'>
		<input style="width: 100px; padding: 0;"
			class="btn btn-primary form-control" type="submit" value="submit">
	</div>
</form>


<script type="text/javascript">
function showparent(){
	if($("#is_root").val()=='1'){
	$("#parent_div").show();
	}else{
		$("#parent_div").hide();
	}
}
$("#parent_div").hide();
$("#is_root").change(function(){
	showparent();	
});

<!--

//-->
</script>
@stop

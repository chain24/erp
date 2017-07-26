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
		style="background-color: #4299EA; border: solid 1px #fff; width: 200px">category
	</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='{{ url('/') }}/category'">{{trans('names.show_category')}}
	</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='{{ url('/') }}/category/create'">{{trans('names.add_category')}}
	</button>
</li>
@stop @section('content')


<div class="header_bar">
	<h1>Category</h1>
</div>
<div class="table-responsive">
	<div class="div_add">
		<button type="button"
			onclick="javascript:location.href='{{ url('/') }}/category/create'"
			class="btn btn-primary">{{trans('names.add_category')}}</button>
	</div>
	<form action="{{URL::route('category.destroy',['id'=>2])}}"
		method="POST" onsubmit="return confirm('确定要删除?');">
		{{ csrf_field() }} {{ method_field('DELETE') }}
		<table
			class="table table-bordered table-hover ">
			<thead>
				<tr>
					<th></th>
					<th>#</th>
					<th>{{trans('names.category_name')}}</th>
					<th>{{trans('names.products')}}</th>
					<th>{{trans('names.operate')}}</th>
				</tr>
			</thead>
			<tbody>
				@if($category) @foreach ($category as $cate)
				<tr id="{{$cate->category_id}}" onclick="showparent({{$cate->category_id}})">
					<td><input value='{{$cate->category_id}}' name='arcID[]'
						type="checkbox"></td>
					<td>{{$cate->category_id}}</td>
					<td>
					@if(count_pid($cate->category_id)!='0')
					<span class="glyphicon glyphicon-plus"></span>
					@endif
					&nbsp&nbsp{{$cate->category_name}}</td>
					<td>{{$cate->total}}</td>
					<td>

						<button type="button"
							onclick="location.href='{{URL::route('category.edit',['id'=>$cate->category_id])}}'"
							class="btn btn-primary">{{trans('names.edit')}}</button>
						<button type="button"
							onclick="location.href='{{URL::route('category.create',['id'=>$cate->category_id])}}'"
							class="btn btn-primary">{{trans('names.add_this_category')}}</button>
					</td>
				</tr>
				{{category_tree($cate->category_id)}}
				@endforeach @endif
			</tbody>
		</table>
		<div>
			<div class="div_del float_left">
				<button type="submit" class="btn btn-danger">{{trans('names.delete')}}</button>
			</div>
	
	</form>
	<div class="div_add float_right">{!! $category->render() !!}</div>
	<div class="clear"></div>
</div>

</div>

@stop
@section('extend-js')
<script>
function showparent($id){
	if($("tr").hasClass('parent_'+$id)){
		$(".parent_"+$id).toggle();

		var len=$(".parent_"+$id).length;
		if($(".parent_"+$id).is(":hidden")){
			$("#"+$id+" td span").removeClass("glyphicon-minus");
			$("#"+$id+" td span").addClass("glyphicon-plus");
			for(i=0;i<len;i++){
			hideson($(".parent_"+$id+":eq("+i+")").attr("id"));
			};
		}else{
			$("#"+$id+" td span").removeClass("glyphicon-plus");
			$("#"+$id+" td span").addClass("glyphicon-minus");
			}
		}
}
function hideson($id){
	if($("tr").hasClass('parent_'+$id)){
		$(".parent_"+$id).hide();
		$("#"+$id+" td span").removeClass("glyphicon-minus");
		$("#"+$id+" td span").addClass("glyphicon-plus");
		hideson($(".parent_"+$id).attr("id"));

	}
}
</script>
@stop
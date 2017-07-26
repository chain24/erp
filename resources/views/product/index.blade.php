@extends('layout.master')


@section('content')


<div class="header_bar">
	<h1>product</h1>
     </div>
    <div class="table-responsive">
        <div class="div_add">
            <button type="button" onclick="javascript:location.href='{{ url('/') }}/product/create'" class="btn btn-primary">{{trans('names.AddProduct')}}</button>
        </div>

			<table class="table table-bordered table-hover table-responsive table-striped" >
			
	<thread>
		<tr class="success">
			<th>{{trans('names.select')}}</th>
			<th>{{trans('names.sku')}}</th>
			<th>{{trans('names.product_title')}}</th>
			<th>{{trans('names.product_weight')}}</th>
			<th>{{trans('names.primary_category')}}</th>
			<th>{{trans('names.description')}}</th>
			<th>{{trans('names.operate')}}</th>
		</tr>
	</thread>
	<form action="/product/2" method="POST" onsubmit="return confirm('确定要删除?');">
 			{{ csrf_field() }}
            {{ method_field('DELETE') }}
	@if($products)
	@foreach ($products as $val)
	<tr class="success">
	<td><input id='arcID' class='np' type='checkbox' value='{{$val->product_id}}' name='arcID[]'/></td>
	<td>{{$val->sku}}</td><td>{{$val->title}}</td><td>{{$val->weight}}</td><td>{{$val->primary_category}}</td><td>{{$val->description}}</td><td><button type="button" onclick="location.href='{{URL::route('product.edit',['id'=>$val->product_id])}}'" class="btn btn-primary">{{trans('names.edit')}}</button></td></tr>
		 
          
	@endforeach
	@endif
	</table>
	<div class="chang_button" align="left" style="margin-top:10px;" >          
<button class="btn btn-danger ">{{trans('names.delete')}}</button>
</form>

</div>
</center>		
</div>
{!! $products->links() !!}

			
@stop

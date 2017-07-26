@extends('layout.master')
@section('sidebar')
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
		style="background-color: #4299EA; border: solid 1px #fff; width: 200px">supplier</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='{{ url('/') }}/supplier'">show
		supplier</button>
</li>

<li class="category_sub" style="border: 0; padding: 0; margin: 0;">
	<button type="button" class="btn btn-primary "
		style="background-color: #F4F4F4; border: solid 1px #fff; color: #6E6B6B; width: 200px"
		onclick="javascript:location.href='{{ url('/') }}/supplier/create'">add
		supplier</button>
</li>
@stop

@section('content')

<div class="header_bar">
        <h1>Supplier</h1>
    </div>

			
			
		<div class="div_add">
            <button type="button" class="btn btn-primary" onclick="javascript:location.href='{{ url('/') }}/supplier/create'">{{trans('names.add_supplier')}}</button>
       	</div>
       	<form action="/supplier/2" method="POST" onsubmit="return confirm('确定要删除?');">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
    <table class="table table-bordered table-hover table-responsive table-striped" >  
	<thread>
		<tr class="success">
			<th >select</th>
			<th >{{trans('names.supplier')}}</th>
			<th >{{trans('names.city')}}</th>
			<th >{{trans('names.state')}}</th>
			<th >{{trans('names.supplier_country')}}</th>
			<th >{{trans('names.zipcode')}}</th>			
			<th >{{trans('names.operate')}}</th>
			<th>{{trans('names.add_to_order')}}</th>
		</tr>
	</thread>
			 
	@if($suppliers)
	@foreach ($suppliers as $val)
	<tr class="success">
	<td><input id='arcID' class='np' type='checkbox' value='{{$val->supplier_id}}' name='arcID[]'/></td>
	<td>{{$val->supplier}}</td><td>{{$val->city}}</td><td>{{$val->state}}</td><td>{{$val->country}}</td><td>{{$val->zipcode}}</td><td><button type="button" onclick="location.href='{{URL::route('supplier.edit',['id'=>$val->supplier_id])}}'" class="btn btn-primary">{{trans('names.edit')}}</button>

           </td><td><button type="button" onclick="location.href='/supplier/{{$val->supplier_id}}'" class="btn btn-primary">{{trans('names.add_to_order')}}</button></td></tr>
	 @endforeach
	@endif
	</table>
	<div class="chang_button" align="left" style="margin-top:10px;" >          
<button class="btn btn-danger">{{trans('names.delete')}}</button>
</form>
</div>
</center>

</div>

{!! $suppliers->links() !!}

@stop

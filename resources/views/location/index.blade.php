@extends('layout.master')

	@section('content')
	<div class="header_bar">
		<h1>Location</h1>
	</div>
	<div class="table-responsive">
		<div class="div_add">
			<button type="button" onclick="javascript:location.href='{{ url('/') }}/location/create'" class="btn btn-primary">{{trans('names.add_location')}}</button>
		</div>		

		<table class="table table-bordered table-hover table-responsive table-striped">
			

			<thread>
				<tr class="success">

					<th>{{trans('names.select')}}</th>
					<th>{{trans('names.location')}}</th>
					<th>{{trans('names.city')}}</th>
					<th>{{trans('names.state')}}</th>
					<th>{{trans('names.zipcode')}}</th>
					<th>{{trans('names.location_phone')}}</th>
					<th>{{trans('names.fax')}}</th>
					<th >{{trans('names.operate')}}</th>

				</tr>
			</thread>
			<form action="/location/2" method="POST" onsubmit="return confirm('确定要删除?');">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				@if($locations)
				@foreach ($locations as $val)
				<tr class="success"><td><input id='arcID' class='np' type='checkbox' value='{{$val->location_id}}' name='arcID[]'/></td><td>{{$val->location}}</td><td>{{$val->city}}</a></td><td>{{$val->state}}</td><td>{{$val->zipcode}}</td><td>{{$val->phone}}</td><td>{{$val->fax}}<td><button type="button" onclick="location.href='{{URL::route('location.edit',['id'=>$val->location_id])}}'" class="btn btn-primary">{{trans('names.edit')}}</button></tr>
				@endforeach
				@endif
			</table>
			<div class="chang_button" align="left" style="margin-top:10px;" >          
				<button class="btn btn-danger">{{trans('names.delete')}}</button>
			</form>
		</div>
	</center>
	{!! $locations->links() !!}
</div>

@stop

@extends('layout.master')
@section('content')
<h1>add serial number</h2>
	<div class='supply_add' style="width:400px;">
		<form method="POST" action="{{ url('/') }}/sn">
			{{ csrf_field() }}

			<div class='form-group'>
				<label for="name">sn</label>
				<textarea class="form-control" name="data[sn]" id="sn"></textarea>			
				
			</div>
			
			</div> 
			<div class='form-group'>
				<input style="width:100px;padding:0;" class="btn btn-primary form-control" type="submit" value="submit">
			</div>
		</div>
	</form>
	@stop
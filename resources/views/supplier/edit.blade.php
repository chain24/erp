@extends('layout.master') 
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create</div>
				<div class="panel-body">
					@foreach ($supplier as $val)
					<form  method="POST"action="{{ url('/') }}/supplier/{{$val->supplier_id}}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="form-group"> 
							<label class="col-md-4 control-label">supplier name</label> 
							<div class="col-md-6">         
								<p><input class="form-control "  name="date[supplier]" value="{{$val->supplier}}"type="text" id="supplier" ></p>
							</div>
						</div>


						<div class="form-group"> 
							<label class="col-md-4 control-label">addr1</label> 
							<div class="col-md-6">         
								<p><input class="form-control "  name="date[addr1]" value="{{$val->addr1}}" type="text" id="addr1" ></p>
							</div>
						</div>

						<div class="form-group"> 
							<label class="col-md-4 control-label">addr2</label> 
							<div class="col-md-6">         
								<p><input class="form-control "  name="date[addr2]" value="{{$val->addr2}}" type="text" id="addr2" ></p>
							</div>
						</div>
						<div class='form-group'>
							<label class="col-md-4 control-label">city</label>
							<div class="col-md-6">		
								<p><input class="form-control " name="date[city]" value="{{$val->city}}"  type="text" id="city" ></p>
							</div>
						</div>
						<div class='form-group'>
							<label class="col-md-4 control-label">state</label>
							<div class="col-md-6">		
								<p><input class="form-control " name="date[state]" type="text" value="{{$val->state}}" id="state"  ></p>
							</div>
						</div>

						<div class='form-group'>
							<label class="col-md-4 control-label">country</label>
							<div class="col-md-6">		 
								<p><input class="form-control " name="date[country]" type="text" value="{{$val->country}}"  id="country" ></p>
							</div>
						</div>

						<div class='form-group'>
							<label class="col-md-4 control-label">zipcode</label>
							<div class="col-md-6">		
								<p><input class="form-control " name="date[zipcode]" type="text" value="{{$val->zipcode}}" id="zipcode" ></p>
							</div>
						</div>
						<div class='form-group'>
							<label class="col-md-4 control-label">contact_title</label>
							<div class="col-md-6">		 
								<p><input class="form-control " name="date[contact_title]" value="{{$val->contact_title}}" type="text" id="contact_title" ></p>
							</div>
						</div>
						<div class='form-group'>
							<label class="col-md-4 control-label">contact_name</label>	
							<div class="col-md-6">	 
								<p><input class="form-control " name="date[contact_name]" type="text" value="{{$val->contact_name}}" id="contact_name" ></p>
							</div>
						</div>
						<div class='form-group'>
							<label class="col-md-4 control-label">contact_phone</label>	
							<div class="col-md-6">	 
								<p><input class="form-control " name="date[contact_phone]" value="{{$val->contact_phone}}" type="text" id="contact_phone" ></p>
							</div>
						</div>

						<div class='form-group'>	
							<label class="col-md-4 control-label">contact_fax</label>
							<div class="col-md-6">	
							</p><input class="form-control " name="date[contact_fax]" value="{{$val->contact_fax}}" type="text" id="contact_fax" ></p>
						</div>
					</div>
					<div class='form-group'>
						<label class="col-md-4 control-label">contact_email</label>	
						<div class="col-md-6">		
							<p><input class="form-control " name="date[contact_email]" type="text"  value="{{$val->contact_email}}" id="contact_email" ></p>
						</div>
					</div>
					<div class='form-group'>
						<div class="col-md-6 col-md-offset-4" align="center">
							<button type="submit" class="btn btn-primary">submit</button> 
						</div>
					</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop

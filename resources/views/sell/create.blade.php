@extends('layout.master')

@section('sidebar')
<li>
<form class="search-form" method="GET" action="search-results.html">
	<div class="search-pane" style="position:relative;">
<input type="text" placeholder="Search here..." name="search" style="width:200px;padding-top:2px;padding-bottom:2px;margin-bottom:4px;">

<img style="position:absolute;left:175px;top:1px;cursor:pointer;"src="{{ url('/') }}/images/Image_01.jpg">
	
			</div>
		</form>
	</li>

@stop


@section('content')

<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F;">Make sure the order</div>
	<form class="form-horizontal" method="POST" action="{{ url('/') }}/sell">
	{{ csrf_field() }}
    <table class="table" style="width: 45%;float: left;">
     	<thead>
     		<tr>
            <th colspan="2"><h2>Location</h2></th>
        </tr>
        </thead>
     	<tr>
   			<td>location name</td>
    		<td>{{$location->location}}<input class="form-control" name="location_name" type="hidden" value="{{$location->location}}" id="location_name"><input class="form-control" name="location_id" type="hidden" value="{{$location->location_id}}" id="location_id"></td>
    	</tr>
    	<tbody>
        <tr>
            <td>addr1</td>
            <td>{{$location->addr1}}</td>
        </tr>
        <tr>
            <td>addr2</td>
            <td>{{$location->addr2}}</td>
        </tr>
        <tr>
            <td>city</td>
            <td>{{$location->city}}</td>
        </tr>
        <tr>
            <td>state</td>
            <td>{{$location->state}}</td>
        </tr>
        <tr>
            <td>country</td>
            <td>{{$location->country}}</td>
        </tr>
        <tr>
            <td>zip code</td>
            <td>{{$location->zipcode}}</td>
        </tr>
        <tr>
            <td>phone</td>
            <td>{{$location->phone}}</td>
        </tr>
        </tbody>
    	<tr>
    	</table>	
    		
    <table class="table" style="width: 45%;float: right;">
        <thead>
        <tr>
            <th colspan="2"><h2>Customer</h2></th>
        </tr>
        </thead>
        <tr>
            <td width="20%">customer name</td>
            <td>{{$customer->customer}}<input class="form-control" name="customer_name" type="hidden" value="{{$customer->customer}}" id="customer_name"><input class="form-control" name="customer_id" type="hidden" value="{{$customer->customer_id}}" id="customer_name"></td>
        </tr>
        <tbody>
        <tr>
            <td>addr1</td>
            <td>{{$customer->addr1}}</td>
        </tr>
        <tr>
            <td>addr2</td>
            <td>{{$customer->addr2}}</td>
        </tr>
        <tr>
            <td>city</td>
            <td>{{$customer->city}}</td>
        </tr>
        <tr>
            <td>state</td>
            <td>{{$customer->state}}</td>
        </tr>
        <tr>
            <td>country</td>
            <td>{{$customer->country}}</td>
        </tr>
        <tr>
            <td>zip code</td>
            <td>{{$customer->zipcode}}</td>
        </tr>
        <tr>
            <td>contact phone</td>
            <td>{{$customer->contact_phone}}</td>
        </tr>
        </tbody>
    </table>
    
        <table class="table table-bordered table-hover table-responsive table-striped">
        <thread>
        <tbody>	
		<tr >
			<th>sku</th>
			<th>product title</th>
			<th>price</th>
			<th>qty</th>
			<th>subtotal</th>
		</tr>
		@foreach ($product as $k => $val)
		<tr>
	<td>{{$val['sku']}}<input type="hidden" value="{{$val['sku']}}" name="data[{{$val['sku']}}]"></td><td>{{$val['title']}}<input type="hidden" value="{{$val['title']}}" name="title[]"></td><td>{{$val['price']}}<input class="form-control" type="hidden" name="data[{{$val['sku']}}][price]" value="{{$val['price']}}"></td><td>{{$val['qty']}}<input class="form-control" name="data[{{$val['sku']}}][qty]"  value="{{$val['qty']}}"  type="hidden"></td><td>{{$val['price']*$val['qty']}}</td></tr>
		@endforeach
	</thread>
	</tbody>
        </table>
		<div class="col-sm-offset-2 col-sm-10 btn_submit" class='form-group'>
		<span style="float: right;width:100px;height:30px;line-height:30px" class="label label-success">total:{{$total}}</span>
			<input style="width:100px;padding:0;" class="btn btn-danger form-control" type="submit" value="submit order">
		</div>
	</form>
		

@stop
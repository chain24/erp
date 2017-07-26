@extends('layout.master')



@section('content')

<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">order show</div>

            <table class="table" style="width: 50%;float:left">
                <thead>
                <tr>
                    <th align="center"><h2>Customer</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right">customer name:</td>
                    <td>{{$customer->customer}}</td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td width="20%" align="right">city:</td>
                    <td>{{$customer->city}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">state:</td>
                    <td>{{$customer->state}}</td>
                </tr>
                <tr>
                    <td  width="20%" align="right">country:</td>
                    <td>{{$customer->country}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">zip code:</td>
                    <td>{{$customer->zipcode}}</td>
                </tr>

                </tbody>
            </table>
            <table class="table" style="width: 45%;float: right;">
        <thead>
        <tr>
            <th colspan="2"><h2>Location</h2></th>
        </tr>
        </thead>
        <tr>
            <td width="20%">location name</td>
            <td>{{$location->location}}</td>
        </tr>
        <tbody>
        <tr>
            <td>addr1</td>
            <td>{{$location->addr1}}</td>
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
            <td>{{$location->contact_phone}}</td>
        </tr>
        </tbody>
    </table>



	<table class="table table-bordered table-hover table-responsive table-striped">
			
        
	<thread>
		<tr bgcolor="#FBFCE2" style="color:black" >
			<th>product sku</th>
            <th>price</th>
            <th>qty</th>
            <th>subtotal</th>
			
			
		</tr>
	</thread>
	@if($data)
	@foreach($data as $k=>$v)
	<tr><td>{{$k}}</td><td>{{$v['price']}}</td><td>{{$v['qty']}}</td><td>{{$v['qty']*$v['price']}}</td></tr>
	@endforeach
	@endif
	</table>
	@if($messages)
    <p class="text-success">{{trans('messages.submit_order_success')}}{{$orders->created_at}}</p>
   @endif   
</center>		
</div>
    <span style="float: right;width:100px;height:30px;line-height:30px" class="label label-success">total:{{$orders->total}}<input class="form-control" type="hidden" name="product_total"/></span>
@stop

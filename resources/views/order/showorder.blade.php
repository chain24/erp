@extends('layout.master')



@section('content')

<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">order show</div>
    @if($supplier)

            <table class="table" style="width: 50%;float:left">
                <thead>
                <tr>
                    <th align="center"><h2>Supplier</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right">supplier name:</td>
                    <td>{{$supplier->supplier}}</td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td width="20%" align="right">city:</td>
                    <td>{{$supplier->city}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">state:</td>
                    <td>{{$supplier->state}}</td>
                </tr>
                <tr>
                    <td  width="20%" align="right">country:</td>
                    <td>{{$supplier->country}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">zip code:</td>
                    <td>{{$supplier->zipcode}}</td>
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
            <td>{{$location->phone}}</td>
        </tr>
        </tbody>
    </table>
    
    <h1>Order</h1>    
        
	<table class="table table-bordered table-hover table-responsive table-striped">
		
        
	<thread>
		<tr>
			<th>product sku</th>
            <th>product title</th>	
            <th>price</th>
            <th>qty</th>
            <th>subtotal</th>
            <th>Serial Numbers</th>			
		</tr>
	</thread>
@endif

	
	
    @if($items)
    @foreach($items as $v)
    <tr><td>{{$v->sku}}</td><td>{{$v->title}}</td><td>{{$v->price}}</td><td>{{$v->qty}}</td><td>{{($v->price)*($v->qty)}}</td><td><!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Serial Numbers<span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{ url('/') }}/sn/create">Add</a></li>
    <li><a href="{{ url('/') }}/sn">list</a></li>    
  </ul>
</div></td></tr>    
    @endforeach
    @endif
	</table>
	   
</center>
	
    <span style="float: right;width:100px;height:30px;line-height:30px" class="label label-success">total:{{$order->total}}<input class="form-control" type="hidden" name="product_total"/></span>
 
@stop


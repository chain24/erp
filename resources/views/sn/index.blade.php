@extends('layout.master')
@section('content')
<div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">SerialNumber show</div>
    
    <table  class="table table-bordered table-hover table-responsive table-striped">
            <caption></caption>
            <thread>
                <tr>
                    <th >Serial Number</th>
                    <th >movement Id</th>
                    <th >product Id</th>
                </tr>
            </thread>  
    @if($sns)
	@foreach($sns as $sn)
	<tr>
		<td>{{$sn->sn}}</td>
		<td>{{$sn->movement_id}}</td>
		<td>{{$sn->product_id}}</td>
	</tr> 
	@endforeach
    @endif        
    </table>             
    {{!! $sns->links()!!}}
    @stop
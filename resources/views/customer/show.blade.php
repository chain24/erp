@extends('layout.master')

@section('content')

    <h1>{{trans('names.select_location')}}</h1>
    <table class="table btn_table table-responsive" style="margin-bottom:0">

        @if($customer)

            <table class="table" style="width: 50%;">
                <thead>
                <tr>
                    <th align="center"><h2>Customer</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right">{{trans('names.customer_name')}}:</td>
                    <td>{{$customer ->customer}}</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="20%" align="right">addr1:</td>
                    <td>{{$customer->addr1}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">addr2:</td>
                    <td>{{$customer->addr2}}</td>
                </tr>
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

        @endif

        <div class="header_bar" style="line-height:24px;background-color:#F4F4F4;padding-left:10px;color:#7F7F7F">
            location management
        </div>
        <table class="table btn_table table-responsive" style="margin-bottom:0">


            <thread>
                <tr bgcolor="#FBFCE2" style="color:white">

                    <th style="text-align:center;background-color:#368EE0">select</th>
                    <th style="text-align:center;background-color:#368EE0">location</th>
                    <th style="text-align:center;background-color:#368EE0">addr1</th>
                    <th style="text-align:center;background-color:#368EE0">addr2</th>
                    <th style="text-align:center;background-color:#368EE0">option</th>
                </tr>
            </thread>

            @if($locations)
                @foreach ($locations as $val)

                    <tr bgcolor='#FFFFFF' align='center' style="background-color:#F4F4F4">
                        <td><input id='arcID' class='np' type='checkbox' value='{{$val->location_id}}' name='arcID[]'/>
                        </td>
                        <td>{{$val->location}}</td>
                        <td>{{$val->addr1}}</a></td>
                        <td>{{$val->addr2}}</td>

                        <form action="{{URL::route('customer.product',['id'=>$val->location_id])}}" method="get">
                            {{ csrf_field() }}
                            @if($customer_id)
                                <input type="hidden" value="{{$customer_id}}" name="customer_id">
                                <input type="hidden" value="{{$val->location_id}}" name="location_id">
                            @endif
                            <td>
                                <button class="btn btn-primary  btn-sm"
                                        style="background-color:#56AF45; border:solid 1px #fff;border-radius:4px;">add
                                </button>
                            </td>
                        </form>
                @endforeach
            @endif
        </table>
        </center>


@stop

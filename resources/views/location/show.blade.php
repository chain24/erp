@extends('layout.master')
   
@section('content')

    <h1>{{trans('names.select_supplier')}}</h1>
    <table class="table btn_table table-responsive" style="margin-bottom:0">

        @if($suppliers)

            <table class="table" style="width: 50%;">
                <thead>
                <tr>
                    <th align="center"><h2>Supplier</h2></th>
                </tr>
                <tr>
                    <td width="20%" align="right">supplier name:</td>
                    <td>{{$suppliers->supplier}}</td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td width="20%" align="right">city:</td>
                    <td>{{$suppliers->city}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">state:</td>
                    <td>{{$suppliers->state}}</td>
                </tr>
                <tr>
                    <td  width="20%" align="right">country:</td>
                    <td>{{$suppliers->country}}</td>
                </tr>
                <tr>
                    <td width="20%" align="right">zip code:</td>
                    <td>{{$suppliers->zipcode}}</td>
                </tr>

                </tbody>
            </table>

        @endif

        <div class="header_bar">
        <h1>Location</h1>
    </div>
        <table class="table btn_table table-responsive">


            <thread>
                <tr >                    
                    <th>{{trans('names.location')}}</th>
                    <th>{{trans('names.city')}}</th>
                    <th>{{trans('names.state')}}</th>
                    <th>{{trans('names.zipcode')}}</th>
                    <th>{{trans('names.location_phone')}}</th>
                    <th>{{trans('names.fax')}}</th>
                    <th >{{trans('names.operate')}}</th>
                </tr>
            </thread>
            @if($locations)
                @foreach ($locations as $val)
                    <tr>                        
                        <td>{{$val->location}}</td>
                        <td>{{$val->city}}</a></td>
                        <td>{{$val->state}}</td>
                        <td>{{$val->zipcode}}</td>
                        <td>{{$val->phone}}</td>
                        <td>{{$val->fax}}</td>
                    
                        <form action="/product/{{$val->location_id}}" method="get">
                            {{ csrf_field() }}
                            @if($supplier_id)
                                <input type="hidden" value="{{$supplier_id}}" name="supplier_id">
                                <input type="hidden" value="{{$val->location_id}}" name="location_id">
                            @endif
                            <td>
                                <button  class="btn btn-primary  btn-sm">{{trans('names.add_to_order')}}</button>                                
                            </td>
                    </tr>        
                        </form>
                @endforeach
            @endif
        </table>
        </center>


@stop

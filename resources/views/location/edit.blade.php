@extends('layout.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    <form method="POST" action="{{url('/') }}/location/{{$location->location_id}}">
                       {{ csrf_field() }}
                      {{ method_field('PUT')}}

                      <div class='form-group'>
                      <label class="col-md-4 control-label">location</label>
                      <div class="col-md-6">
                       <p><input class="form-control" value="{{$location->location}}" name="data[location]" type="text" id="location"/></p>
                     </div>
                     </div>

                     <div class='form-group'>
                      <label class="col-md-4 control-label">city</label>
                      <div class="col-md-6">
                      <p><input class="form-control" value="{{$location->city}}" name="data[city]" type="text" id="city"></p>
                    </div>
                    </div>

                    <div class='form-group'>
                      <label class="col-md-4 control-label">state</label>
                      <div class="col-md-6">
                      <p><input class="form-control" value="{{$location->state}}" name="data[state]" type="text" id="state"></p>
                    </div>
                    </div>

                    <div class='form-group'>
                      <label class="col-md-4 control-label">zipcode</label>
                      <div class="col-md-6">
                      <p><input class="form-control" value="{{$location->zipcode}}" name="data[zipcode]" type="text" id="state"></p>
                    </div>
                  </div>
                  <div class='form-group'>
                    <div class="col-md-6 col-md-offset-4" align="center">
                     <button type="submit" class="btn btn-primary">submit</button> 
                   </div>
                 </div> 
                  </form>
                </div>
              </div>
            </div>
          </div>
          @stop
                






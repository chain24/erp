<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Superbiiz\Inventory\Models\Location;
use Superbiiz\Inventory\Models\Supplier;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Superbiiz\Inventory\Models\Customer;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $locations=Location::paginate(trans('pagination.page_size'));
        return view('location.index',['locations'=>$locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $data=Input::get('data');
        Location::create($data);  
        $msg=trans('messages.create_success');
        return Redirect::route("location.index")->with('msg',$msg);               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {   
        $locations=Location::all();  
        $supplier_id = Input::get('supplier_id');
        $customer_id = Input::get('customer_id');
        if($supplier_id){
        $suppliers = Supplier::find($supplier_id);
        return view('location.show',array('locations'=>$locations,'suppliers'=>$suppliers,'supplier_id'=>$supplier_id));
        }
        if($customer_id){
        $customer = Customer::find($customer_id);
        return view('location.show',array('locations'=>$locations,'customer'=>$customer,'customer_id'=>$customer_id));
        }
        //return view('location.showorder')->withLocations(Location::all());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        return view('location.edit')->withLocation(Location::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
		$input = Input::all();
		$location = Location::find($id);                
        $location->update($input['data']);
        $msg = trans('messages.edit_success');		
		if( $location->update($input['data'])){
            return Redirect::route("location.index")->with('msg',$msg);
        }               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {	       
        $del_id = $request->input('arcID');
        for($i=0;$i<count($del_id);$i++){

            $location = Location::find($del_id[$i]);

            if($location){
                $location->delete();
            }
        }  
           return Redirect::route("location.index");
       
    }
}

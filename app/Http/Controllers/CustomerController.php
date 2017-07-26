<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Superbiiz\Inventory\Models\Customer;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Superbiiz\Inventory\Models\Location;
use Superbiiz\Inventory\Models\Product;
use Superbiiz\Inventory\Models\Category;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::select('customer_id','customer','contact_phone','contact_email')->orderby('created_at','desc')->paginate(trans('pagination.page_size'));
        return view('customer.index',['customer'=>$customer]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::get('date');
        $supplier = new Customer();
        $supplier->create($input);
        $msg = trans('messages.create_success');
        return Redirect::route("customer.index")->with('msg',$msg);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Redirect::route("location.select",array('customer_id'=>$id) );
        $locations = Location::select('location_id','location','addr1','addr2')->orderby('created_at','desc')->paginate(trans('pagination.page_size'));
        $customer = Customer::find($id);
        return view('customer.show',array('locations'=>$locations,'customer'=>$customer,'customer_id'=>$id));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::whereRaw('customer_id = ?',[$id])->get();
        return view('customer.edit',['customer'=>$customer]);
        //
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
        $input = Input::get('date');
        $customer = Customer::find($id); 
        $customer->fill($input);
        $customer->save();
        $msg = trans('messages.edit_success');
        return Redirect::route("customer.index")->with('msg',$msg);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $del_id = Input::get('arcID');
        foreach ($del_id as $id){
            $customer = Customer::find($id);
            if($customer){
                $customer->delete();
            }
        }
         $msg = trans('messages.del_success');
        return Redirect::route("customer.index")->with('msg',$msg);
        //
    }
    public function showproduct(Request $request)
    {
        $category = Category::all('category_name','category_id');
       $product = Product::paginate(trans('pagination.page_size'));
       $location_id = $request->input('location_id');
       $location = Location::whereRaw('location_id = ?',[$location_id])->first();
	   $customer_id=$request->input('customer_id');
	   $customer = Customer::whereRaw('customer_id = ?',[$customer_id])->first();
	   //echo $location_id.$customer_id;
	   return view('customer.productshow',['product'=>$product,'category'=>$category,'customer'=>$customer,'location'=>$location]);
        //
    }
}

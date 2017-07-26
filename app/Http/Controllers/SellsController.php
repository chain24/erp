<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Superbiiz\Inventory\Models\Location;
use Superbiiz\Inventory\Models\Customer;
use Illuminate\Support\Facades\Input;
use Superbiiz\Inventory\SoldOrder;
use App\Http\Requests;
use Superbiiz\Inventory\Models\SellOrder;

class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $location = Location::whereRaw('location_id = ?',[Input::get('location_id')])->first();
        $customer = Customer::whereRaw('customer_id = ?',[Input::get('customer_id')])->first();
        $product_id = $request->input('arcID');
        $sku = Input::get('sku');
        $price = Input::get('product_price');
        $qty = Input::get('product_qty');
        $title=Input::get('title');
        $id=array();
        $total="";
        for($i=0;$i<count($product_id);$i++){
            $id[$i]['id']= $product_id[$i];
            $id[$i]['sku']= $sku[$i];
            $id[$i]['price']= $price[$i];
            $id[$i]['qty']= $qty[$i];
            $id[$i]['title']=$title[$i];
            $total += $price[$i]*$qty[$i];
        }
        //$product = Product::whereIn('product_id',$id)->get();
        return view('sell.create',['location'=>$location,'customer'=>$customer,'product'=>$id,'total'=>$total]);
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
        $location   = Location::whereRaw('location_id = ?',[Input::get('location_id')])->first();
        $customer   = Customer::whereRaw('customer_id = ?',[Input::get('customer_id')])->first();
        $data = Input::get('data');
        $title=Input::get('title');
        $sold   = new SoldOrder();
        $sold->setCustomer($customer);
        $sold->setLocation($location);
        $sold->setParts($data);
        $total = $sold->getTotal();
        $orders = SellOrder::whereRaw('customer_id = ? and location_id = ?',[[Input::get('customer_id')],[Input::get('location_id')]])
        ->orderBy('sell_order_id','desc')->first();
        $sold->order();
        return view('sell.show',['orders'=>$orders,'location'=>$location,'customer'=>$customer,'data'=>$data,'title'=>$title,'total'=>$total])->withmessages(trans('submit_order_success'));
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
        //
    }
}

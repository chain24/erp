<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Superbiiz\Inventory\Models\Location;
use Superbiiz\Inventory\Models\Product;
use Superbiiz\Inventory\Models\PcsOrder;
use Superbiiz\Inventory\Models\PcsItem;
use Superbiiz\Inventory\Models\Supplier;
use Superbiiz\Inventory\PurchaseOrder;
use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders=PcsOrder::paginate(trans('pagination.page_size'));
      return view('order.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $location = Location::whereRaw('location_id = ?',[Input::get('location_id')])->first();
        $supplier = Supplier::whereRaw('supplier_id = ?',[Input::get('supplier_id')])->first();
        $product_id = $request->input('arcID');
        $id = $request->input('product_id');
        $sku = Input::get('sku');
        $price = Input::get('product_price');
        $qty = Input::get('product_qty');
        $title=Input::get('title');
        $total="";
        $id=array();
        

        for($i=0;$i<count($product_id);$i++){
            $id[$i]['id']= $product_id[$i];
            $id[$i]['sku']= $sku[$i];
            $id[$i]['price']= $price[$i];
            $id[$i]['qty']= $qty[$i];
            $id[$i]['title']=$title[$i];           
            $total += $price[$i]*$qty[$i];
        }
        //$product = Product::whereIn('product_id',$id)->get();
        return view('order.create',['location'=>$location,'supplier'=>$supplier,'product'=>$id,'total'=>$total]);
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
        $this->validate($request,[
            'sku' => 'required',
            ]);
        
        $location_name = Input::get('location_name');
        $supplier_name = Input::get('supplier_name');
        $sku = Input::get('sku');           
        $title=Input::get('title');
        $price = Input::get('product_price');
        $qty = Input::get('product_qty');
        $location   = Location::whereRaw('location = ?',[$location_name])->first();
        $supplier   = Supplier::whereRaw('supplier = ?',[$supplier_name])->first();
        $purchase   = new PurchaseOrder();
        $purchase->setSupplier($supplier);
        $purchase->setLocation($location);
        $product_arr = array();
        for($i=0;$i<count($sku);$i++){
            $product_arr[$sku[$i]] = [
                'price' => $price[$i],
                'qty' => $qty[$i],
            ];
        }
        $purchase->setParts($product_arr);
        $orderId=$purchase->order();
        $order = PcsOrder::whereRaw('supplier_id = ? and location_id = ?',[$supplier->supplier_id,$location->location_id])->first();
        

        if($order)
        {
            $purchase   = new PurchaseOrder($order->pcs_order_id);
            
            $purchase->setSupplier($supplier);
            $purchase->setLocation($location);
            $purchase->setParts($product_arr);            
            $purchase->order();
			
        
        }
        if ($orderId) {
        $orders=PcsOrder::find($orderId);
        $location_id=$orders->location_id;
        $supplier_id=$orders->supplier_id;
        $location=Location::find($location_id);
        $supplier=Supplier::find($supplier_id);
        return view('order.show',['orders'=>$orders,'location'=>$location,'supplier'=>$supplier,'sku'=>$sku,'qty'=>$qty,'price'=>$price,'title'=>$title])->withmessages(trans('submit_order_success'));
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $order = PcsOrder::find($id); 
       $items = PcsItem::whereRaw('pcs_order_id = ?',[$id])->get();    
       $location = Location::find($order->location_id);
       $supplier = Supplier::find($order->supplier_id);       
       return view('order.showorder',['order'=>$order,'items'=>$items,'location'=>$location,'supplier'=>$supplier]);
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

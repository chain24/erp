<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Superbiiz\Inventory\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Superbiiz\Inventory\Models\Category;
use phpDocumentor\Reflection\DocBlock\Location;
use Superbiiz\Inventory\Models\Supplier;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::whereRaw('category_pid = ?',['0'])->get();
        $products = Product::paginate(trans('pagination.page_size'));
        return view('product.index',['products'=>$products,'category'=>$category]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['category_id','category_name']);
        if(!$categories){
            return '请先创建一个分类';
        }else{
        return view('product.create',['categories'=>$categories]);
        }
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
        $data=Input::get('data');
        $product = new Product();
        $product->create($data);
        $msg = trans('messages.create_success');
        return Redirect::route("product.index")->with('msg',$msg);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $category = Category::all('category_name','category_id');
       $product = Product::paginate('15');
       $location_id = $request->input('location_id');
       $location = \Superbiiz\Inventory\Models\Location::whereRaw('location_id = ?',[$location_id])->first();
       //$location_id = '1';
	   $supplier_id=$request->input('supplier_id');
	   $supplier = Supplier::whereRaw('supplier_id = ?',[$supplier_id])->first();
	   //$supplier_id = '7';
	   return view('product.show',['product'=>$product,'category'=>$category,'supplier'=>$supplier,'location'=>$location]);
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
        $product = Product::whereRaw('product_id = ?',[$id])->get();
        $categories = Category::all(['category_id','category_name']);
        return view('product.edit',['product'=>$product,'categories'=>$categories]);
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
        $data=Input::get('data');
        $product = Product::find($id);

        $product->update($data);
        $msg = trans('messages.edit_success');
        return Redirect::route("product.index")->with('msg',$msg);
        //
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
            $product = Product::find($del_id[$i]);
            if($product){
                $product->delete();
            }
        }     
         return back()->withInput();
        }
        //

    
    public function showorder(Request $request){
    $id=$request->input('locationid');
	$supplier_id=$request->input('supplierid');
	return Redirect::route('product.show')->with('supplier_id',$supplier_id)->with('location_id',$id);

    }
}

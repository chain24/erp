<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Superbiiz\Inventory\Models\Supplier;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate(trans('pagination.page_size'));
        return view('supplier.index',['suppliers'=>$suppliers]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
        $supplier = new Supplier();
        $supplier->create($input);
        $msg = trans('messages.create_success');
        return Redirect::route("supplier.index")->with('msg',$msg);
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
        return Redirect::route("location.select",array('supplier_id'=>$id) );
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
        $suppliers = Supplier::whereRaw('supplier_id = ?',[$id])->get();
        return view('supplier.edit',['supplier'=>$suppliers]);
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
        $input = Input::all();
        $supplier = Supplier::find($id);        
        $supplier->update($input['date']);
        $msg = trans('messages.edit_success'); 
        if( $supplier->update($input['date'])){
            return Redirect::route("supplier.index")->with('msg',$msg);
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
            $supplier = Supplier::find($del_id[$i]);
            if($supplier){
                $supplier->delete();
            }
        }     
        return Redirect::route("location.index");
    }
    
}

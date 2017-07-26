<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Superbiiz\Inventory\Models\SerialNumber;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Superbiiz\Inventory\Models\InventoryMovements;
class SnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $sns = SerialNumber::paginate(trans('pagination.page_size'));
        return view('sn.index',['sns'=>$sns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('sn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sns = SerialNumber::paginate(trans('pagination.page_size'));
        $data=Input::get('data');  
         if(SerialNumber::create($data)){        
            return view('sn.index',['sns'=>$sns]);
        }else{
            return Redirect::back()->withInput()->withErrors(trans('messages.create_failed'));
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

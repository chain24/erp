<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Superbiiz\Inventory\Models\Product;
use Superbiiz\Inventory\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
class AjaxController extends Controller
{
    /**
     * 返回产品数据
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $category_id = Input::get('category_id');
        if($category_id){
        $product = Product::whereRaw('primary_category = ?',[$category_id])->get();
        if ($product) {
            return response()->json($product);
        } else {
            echo "error";
        }
        }else{
            $product_id = Input::get('product_id');
            $product = Product::whereIn('product_id',$product_id)->get();
            if ($product) {
                return response()->json($product);
            } else {
                echo "error";
            }
        }
    }
}
?>

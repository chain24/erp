<?php

use Illuminate\Support\HtmlString;
use Superbiiz\Inventory\Models\Category;

if (! function_exists('category_tree')) {
/**
 * Get the category view parent tree for the given view.
 *
 * @param  string  $cate_id
 */
    function category_tree($cate_id,$num=40){
    $cate_son = DB::table('categories')
                        ->leftjoin('products','products.primary_category','=','categories.category_id')
                        ->select('categories.category_id','categories.category_pid','categories.category_name',DB::raw('count(products.product_id) as total'))
                        ->where('category_pid',$cate_id)
                        ->groupBy('categories.category_id')
                        ->get();
    if(!empty($cate_son)){
        if(!isset($html)){
            $html = "";
        };
        
        foreach ($cate_son as $cate){
            $son_num = count_pid($cate->category_id);
            if($son_num!='0'){
            $html .= "<tr onclick=\"showparent(".$cate->category_id.")\" class='parent_".$cate->category_pid." ' id='".$cate->category_id."' style=\"display: none;\">
					<td><input value='".$cate->category_id."' name='arcID[]'
						type='checkbox'></td>
					<td>".$cate->category_id."</td>
					<td style=\"padding-left: ".$num."px\"><h6><span class=\"glyphicon glyphicon-plus\"></span>&nbsp&nbsp".$cate->category_name."<small style='margin-left:40px'>parent:".$cate->category_pid."</small></h6></td>
					<td>".$cate->total."</td>
					<td><button type='button'
							onclick=\"location.href='".URL::route('category.edit',['id'=>$cate->category_id])."'\"
							class=\"btn btn-primary\">".trans('names.edit')."</button>
						<button type=\"button\"
							onclick=\"location.href='".URL::route('category.create',['id'=>$cate->category_id])."'\"
							class=\"btn btn-primary\">".trans('names.add_this_category')."</button>
					</td>
				</tr>";
            }else{
                $html .= "<tr onclick=\"showparent(".$cate->category_id.")\" class='parent_".$cate->category_pid." ' id='".$cate->category_id."' style=\"display: none;\">
					<td><input value='".$cate->category_id."' name='arcID[]'
						type='checkbox'></td>
					<td>".$cate->category_id."</td>
					<td style=\"padding-left: ".$num."px\"><h6>&nbsp&nbsp".$cate->category_name."<small style='margin-left:40px'>parent:".$cate->category_pid."</small></h6></td>
					<td>".$cate->total."</td>
					<td><button type='button'
							onclick=\"location.href='".URL::route('category.edit',['id'=>$cate->category_id])."'\"
							class=\"btn btn-primary\">".trans('names.edit')."</button>
						<button type=\"button\"
							onclick=\"location.href='".URL::route('category.create',['id'=>$cate->category_id])."'\"
							class=\"btn btn-primary\">".trans('names.add_this_category')."</button>
					</td>
				</tr>";
            }
            $html .= category_tree($cate->category_id,$num+20);
            
        }
        return new HtmlString($html);
    }
}
}
if (! function_exists('count_pid')) {
    /**
     *  son category number
     *
     * @param  string  id
     */
    function count_pid($id){
        $count = Category::where('category_pid',$id)->count();
        return $count;
    }
}
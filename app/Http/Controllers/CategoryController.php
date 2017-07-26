<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Superbiiz\Inventory\Models\Category;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\Job;
use Illuminate\Support\Facades\Input;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('categories')
                        ->leftjoin('products','products.primary_category','=','categories.category_id')
                        ->select('categories.category_id','categories.category_name',DB::raw('count(products.product_id) as total'))
                        ->where('category_pid','0')
                        ->groupBy('categories.category_id')
                        ->paginate(trans('pagination.page_size'));
        $category_all = Category::all('category_id','category_name','category_pid');
        return view('category.index',['category'=>$category,'category_all'=>$category_all]);
        //分类首页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category_id = Input::get('id');
        $categories = Category::all(['category_id','category_name']);
        return view('category.create',['categories'=>$categories,'category_id'=>$category_id]);
        //添加分类页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:255'
        ]);
        $name = $request->input('category_name');
        $parentid = $request->input('parent_id');
                $category = new Category();
                $category->category_name = $name;
                if($parentid!='0'){
                $parent = Category::find($parentid);
                $category->setParent($parent);
                }else{
                    $category->setRoot();
                }
                $category->save();
                $msg = trans('messages.create_success');
        return Redirect::route("category.index")->with('msg',$msg);
        
        //添加新的分类名
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')
                        ->leftjoin('products','products.primary_category','=','categories.category_id')
                        ->select('categories.category_id','categories.category_name',DB::raw('count(products.product_id) as total'))
                        ->where('category_pid',$id)
                        ->groupBy('categories.category_id')
                        ->paginate(15);
        return view('category.index',['category'=>$category]);
        //打开分类内容页面
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::whereRaw('category_id = ?',[$id])->get();
        $categories = Category::all(['category_id','category_name']);
        return view('category.edit',['category'=>$category,'categories'=>$categories]);
        //打开编辑分类页面
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
        ]);
        $cateogry = Category::find($id);
        $cateogry->category_name = $request->input('category_name');
        $cateogry->level = $request->input('level');
        $cateogry->category_pid = $request->input('parent_id');
        $cateogry->save();
        return back()->withInput();
        //return view('category.index');
        //修改分类
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $del_id = $request->input('arcID');
        for($i=0;$i<count($del_id);$i++){
            $category = Category::find($del_id[$i]);
            if($category){
                $category->delete();
            }
        }     
         return back()->withInput();
        }
        //
  
    }
    

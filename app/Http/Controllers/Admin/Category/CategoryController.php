<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.showCategories' ,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate(request(),[
            'name'=>'required|unique:categories|max:255',
			]
			
        );
        // dd($request->all());
        Category::create($request->all());
        $notification=array(
            'messege'=>'Category Added Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
       
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
        $category = Category::find($id);
        return view('admin.category.editeCategory',compact('category'));
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
        $this->validate(request(),[
            'name'=>'required|max:255',
			]
			
        );
        $update = Category::find($id)->update($request->all());
        // dd($update);
        if($update){
            $notification=array(
                'messege'=>'Category Updated Successfully!',
                'alert-type'=>'success'
                 );
        }else{
            $notification=array(
                'messege'=>'Nothing to Update!',
                'alert-type'=>'error'
                 );
        }
        
        return Redirect('admin/categories')->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Category::find($id)->delete();
        $notification=array(
            'messege'=>'Category Deleted Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }
}

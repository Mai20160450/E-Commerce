<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Image;
use Illuminate\Http\Request;
use DateTime;

class ProductController extends Controller
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
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.addProduct' ,compact('categories','subCategories','brands'));
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
            'name'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'brand_id'=>'required',
            'code'=>'required',
            'quantity'=>'required',
            'size'=>'required',
            'color'=>'required',
            'details'=>'required',
            'sellingPrice'=>'required',
            'videoLink'=>'required',
            'image_one'=>'required',
            'image_two'=>'required',
            'image_three'=>'required',
			]
			
        );

        $request['status'] = 1;
        $uploadPath = 'media/product/';
        
        if($request->image_one){
            $img_name = time() . '-' . rand(9999, 999999). '.' . $request->image_one->getClientOriginalExtension();
            $image_resize = Image::make($request->image_one->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path($uploadPath. $img_name));
            $db_name = $uploadPath . $img_name;
            $request['imageOne'] = $db_name;
            // dd($request->all());
        }
        if($request->image_two){
            $img_name = time() . '-' . rand(9999, 999999). '.' . $request->image_two->getClientOriginalExtension();
            $image_resize = Image::make($request->image_two->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path($uploadPath. $img_name));
            $db_name = $uploadPath . $img_name;
            $request['imageTwo'] = $db_name;
            // dd($request->all());
        }
        if($request->image_three){
            $img_name = time() . '-' . rand(9999, 999999). '.' . $request->image_three->getClientOriginalExtension();
            $image_resize = Image::make($request->image_three->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path($uploadPath. $img_name));
            $db_name = $uploadPath . $img_name;
            $request['imageThree'] = $db_name;
            // dd($request->all());
        }
   


        Product::create($request->all());
        $notification=array(
            'messege'=>'Product Added Successfully!',
            'alert-type'=>'success'
             );
        return Redirect('admin/products')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.showProduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.editeProduct',compact('product','categories','subCategories','brands'));
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
        if($request->imageOne){
            dd($request->all());
            
        }else{
            Product::find($id)->update($request->all());
            $notification=array(
                'messege'=>'Product Added Successfully!',
                'alert-type'=>'success'
                 );
            return Redirect('admin/products')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Product::find($id);
        
        $notification=array(
            'messege'=>'Product Deleted Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }


    public function getSubCategories($id){
        $subCategories = SubCategory::where('category_id',$id)->get();
        return Response()->json($subCategories);
    }
    public function changeProductStatu($id){
        $product = Product::find($id);
        if($product->status == 1){
            $product->status = 0;
            $product->save();
        }else{
            $product->status = 1;
            $product->save();
        }
        $notification=array(
            'messege'=>'Product Status Updated Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }
}

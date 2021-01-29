<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        $brands = Brand::all();
        return view('admin.brand.showBrands' ,compact('brands'));
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
            'name'=>'required|unique:categories|max:55',
			]
			
        );
        // dd($request->all());
        $image = $request->file('logoName');
        if($image){
            $imageName = date('dym_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName . '.'.$ext;
            $uploadPath = 'media/brand/';
            $imageUrl = $uploadPath.$imageFullName;
            // dd($imageUrl);
            $success = $image->move($uploadPath,$imageFullName);
            $request['logo'] = $imageUrl;
            // dd($request['logo']);
            Brand::create($request->all());
            $notification=array(
                'messege'=>'Brand Added Successfully!',
                'alert-type'=>'success'
                 );
        }else{
            Brand::create($request->all());
            $notification=array(
                'messege'=>'Its Done!',
                'alert-type'=>'success'
                 );
        }
        
        
        
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
        $brand = Brand::find($id);
        return view('admin.brand.editeBrand',compact('brand'));
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
        // dd($id);
        $brand = Brand::find($id);
        $oldLogo =  $brand->logo;
        $image = $request->file('logoName');
        if($image){
            unlink($oldLogo);
            $imageName = date('dym_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName . '.'.$ext;
            $uploadPath = 'media/brand/';
            $imageUrl = $uploadPath.$imageFullName;
            // dd($imageUrl);
            $success = $image->move($uploadPath,$imageFullName);
            $request['logo'] = $imageUrl;
            // dd($request['logo']);
            $brand->update($request->all());
            $notification=array(
                'messege'=>'Brand Updated Successfully!',
                'alert-type'=>'success'
                 );
        }else{
            $brand->update($request->all());
            $notification=array(
                'messege'=>'Brand Updated without image Successfully!',
                'alert-type'=>'success'
                 );
        }
        return Redirect('admin/brands')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        unlink($brand->logo);
        $brand->delete();
        $notification=array(
            'messege'=>'Brand Deleted Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }
}

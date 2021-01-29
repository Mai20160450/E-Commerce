<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\NewsLater;
use Illuminate\Http\Request;

class CouponController extends Controller
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
        $coupons = Coupon::all();
        return view('admin.coupon.showCoupons' ,compact('coupons'));
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
            'coupon'=>'required',
            'discount'=>'required',
			]
			
        );
        // dd($request->all());
        Coupon::create($request->all());
        $notification=array(
            'messege'=>'Coupon Added Successfully!',
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
        $coupon = Coupon::find($id);
        return view('admin.coupon.editeCoupon',compact('coupon'));
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
            'coupon'=>'required',
            'discount'=>'required',
			]
			
        );
        $update = Coupon::find($id)->update($request->all());
        // dd($update);
        if($update){
            $notification=array(
                'messege'=>'Coupon Updated Successfully!',
                'alert-type'=>'success'
                 );
        }else{
            $notification=array(
                'messege'=>'Nothing to Update!',
                'alert-type'=>'error'
                 );
        }
        
        return Redirect('admin/coupons')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        $notification=array(
            'messege'=>'Coupon Deleted Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }

    public function getSubscribers(){
        $subscribers = NewsLater::all();
        return view('admin.coupon.newsLaters' ,compact('subscribers'));
    }

    public function deleteSubscribers($id){
        NewsLater::find($id)->delete();
        $notification=array(
            'messege'=>'Subscriber Deleted Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }
}

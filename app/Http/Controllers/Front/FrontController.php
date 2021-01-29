<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\NewsLater;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function storeSubscribe(Request $request){
        $this->validate(request(),[
            'email'=>'required',
			]
			
        );
        // dd($request->all());
        NewsLater::create($request->all());
        $notification=array(
            'messege'=>'Subscribe Added Successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->back()->with($notification);
    }
}

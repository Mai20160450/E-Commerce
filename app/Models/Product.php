<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','subcategory_id','brand_id','name','code','quantity','details','color','size','sellingPrice','discountPrice','videoLink','mainSlider','hotDeal','bestRated','midSlider','hotNew','trend','imageOne','imageTwo','imageThree','status',
    ];
    public function category()
    {
    	return $this->belongsTo(Category::class );
    }
    public function brand()
    {
    	return $this->belongsTo(Brand::class );
    }
    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class );
    }
}

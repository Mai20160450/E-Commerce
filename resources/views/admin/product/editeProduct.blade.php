@extends('admin.admin_layouts')
    

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
        </nav>
    
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edite Product
                    <a href="{{url('/admin/products')}}" class="btn btn-sm btn-success pull-right">All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Product Edite From</p>
                <form method="post" action="/admin/products/{{$product->id}}"enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{$product->name}}" type="text" name="name"  placeholder="Product Name">
                        </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" value="{{$product->code}}" type="text" name="code"  placeholder="Product code">
                        </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                <input class="form-control" value="{{$product->quantity}}" type="text" name="quantity" placeholder="Product Quantity">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Discount: <span class="tx-danger">*</span></label>
                                <input class="form-control" value="{{$product->discount}}" type="text" name="discount" placeholder="Product Discount">
                            </div>
                        </div><!-- col-4 -->
                        
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                              <select name="category_id" class="form-control select2" data-placeholder="Choose category">
                                  <option selected disabled>Choose category</option>
                                  @foreach ($categories as $item)
                                  <option value="{{$item->id}}" @if($item->id == $product->category->id) selected @endif>{{$item->name}}</option>
                                  @endforeach
                                
                                
                              </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label>
                              <select name="subcategory_id" class="form-control select2" data-placeholder="Choose sub-category">
                                <option disabled>sub-category</option>
                                @foreach ($subCategories as $item)
                                    @if ($item->id == $product->subcategory->id)
                                    <option selected value="{{$product->subCategory->id}}">{{$product->subCategory->name}}</option>
                                    @endif
                                @endforeach
                              </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                              <select name="brand_id" class="form-control select2" data-placeholder="Choose brand">
                                <option disabled selected>Choose brand</option>
                                @foreach ($brands as $item)
                                <option value="{{$item->id}}" @if($item->id == $product->brand->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                <input class="form-control" value="{{$product->size}}" type="text" name="size" id="size" data-role="tagsinput" >
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                <input class="form-control" value="{{$product->color}}" type="text" name="color" id="color" data-role="tagsinput">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" value="{{$product->sellingPrice}}"name="sellingPrice" placeholder="Selling Price">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                <textarea id="summernote" class="form-control" name="details" >{{$product->details}}</textarea>
                                
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Video Link" value="{{$product->videoLink}}" name="videoLink">
                            </div>
                        </div><!-- col-4 -->
                        
                        
                    </div><!-- row -->
                    <hr>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input @if ($product->mainSlider == 1)
                                    checked
                                @endif name="mainSlider" value="1" type="checkbox">
                                <span>Main Slider</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input @if ($product->hotDeal == 1)
                                    checked
                                @endif name="hotDeal" value="1" type="checkbox">
                                <span>Hot Deal</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input @if ($product->bestRated == 1)
                                    checked
                                @endif name="bestRated"  value="1" type="checkbox">
                                <span>Best Rated</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input @if ($product->trend == 1)
                                    checked
                                @endif name="trend" value="1" type="checkbox">
                                <span>Trend Product</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input @if ($product->midSlider == 1)
                                    checked
                                @endif name="midSlider" value="1" type="checkbox">
                                <span>Mide Slider</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input @if ($product->hotNew == 1)
                                    checked
                                @endif name="hotNew" value="1" type="checkbox">
                                <span>Hot New</span>
                              </label>
                        </div><!-- col-4 -->

                    </div><!-- End Row -->
        
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit Form</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
              </div>
           
    
        
    
        </div><!-- sl-pagebody -->

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                
                <p class="mg-b-20 mg-sm-b-30">New Product Edite From</p>
                <form method="post" action="/admin/products/{{$product->id}}"enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-layout">
                    <div class="row ">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Image One: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input required name="image_one" type="file" id="file" class="custom-file-input" onchange="readURL(this,'one');">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="one" alt="">
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{url('/').'/'.$product->imageOne}}" height="80" width="80" alt="">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                <input required name="image_two" type="file" id="file" class="custom-file-input" onchange="readURL(this,'two');">
                                <span class="custom-file-control"></span>
                                <img src="#" id="two" alt="">
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{url('/').'/'.$product->imageTwo}}" height="80" width="80" alt="">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                <input required name="image_three" type="file" id="file" class="custom-file-input" onchange="readURL(this,'three');">
                                <span class="custom-file-control"></span>
                                <img src="#" id="three" alt="">
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{url('/').'/'.$product->imageThree}}" height="80" width="80" alt="">
                        </div>
                    </div><!-- row -->
                   
        
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update Photo</button>
                    </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
              </div>
           
    
        
    
        </div><!-- sl-pagebody -->
        
    </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
   $('select[name="category_id"]').change(function(){
        var category_id = $(this).val();
        
        if (category_id) {
          
          $.ajax({
            url: "{{ url('admin/get/subcategory/') }}/"+category_id,
            type:"GET",
            dataType:"json",
            success:function(data) { 
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){
            
            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');

            });
            },
          });

        }else{
          alert('danger');
        }

          });
    });

</script>
<script type="text/javascript">
    function readURL(input,one){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#'+one)
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection

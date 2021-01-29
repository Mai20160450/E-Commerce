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
                <h6 class="card-body-title">Show Product
                    <a href="{{url('/admin/products')}}" class="btn btn-sm btn-success pull-right">All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Show Product</p>
                
                    <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->name}}</strong>
                            
                        </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->code}}</strong>
                        </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label><br>
                                <strong>{{$product->quantity}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                              <strong>{{$product->category->name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label><br>
                              <strong>{{$product->subcategory->name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Brand: <span class="tx-danger">*</span></label><br>
                              <strong>{{$product->brand->name}}</strong>
                              
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                                <strong>{{$product->size}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                                <strong>{{$product->color}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label><br>
                                <strong>{{$product->sellingPrice}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label><br>
                                <strong>{!!$product->details!!}</strong>
                                
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label><br>
                                <strong>{{$product->videoLink}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnali): <span class="tx-danger">*</span></label><br>
                                <img src="{{url('/').'/'.$product->imageOne}}" alt="Brand Logo" height="80px;"width="80px;">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                                <img src="{{url('/').'/'.$product->imageTwo}}" alt="Brand Logo" height="80px;"width="80px;">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                                <img src="{{url('/').'/'.$product->imageThree}}" alt="Brand Logo" height="80px;"width="80px;">
                            </div>
                        </div><!-- col-4 -->
                        
                    </div><!-- row -->
                    <hr>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label >
                                @if($product->mainSlider == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                                <span>Main Slider</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label>
                                @if($product->hotDeal == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                                <span>Hot Deal</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label>
                                @if($product->bestRated == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                                <span>Best Rated</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label>
                                @if($product->trend == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                                <span>Trend Product</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label>
                                @if($product->midSlider == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                                <span>Mide Slider</span>
                              </label>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label>
                                @if($product->hotNew == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                                <span>Hot New</span>
                              </label>
                        </div><!-- col-4 -->

                    </div><!-- End Row -->
        
                    
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

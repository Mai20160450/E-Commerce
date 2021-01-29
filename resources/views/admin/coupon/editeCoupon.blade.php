@extends('admin.admin_layouts')

@section('admin_content')

    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
            <h6 class="card-body-title">Edite Coupon </h6>
            
          <form method="post" name="_method" action="/admin/coupons/{{$coupon->id}}">
            @csrf
            {{method_field('PUT')}}
            <div class="modal-body pd-20">
              
              <div class="form-group">
                <label for="exampleInputEmail1">Coupon Code</label>
                <input type="text" name="coupon" value="{{$coupon->coupon}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Code">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Coupon Discount (%)</label>
                <input type="text" name="discount" value="{{$coupon->discount}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Discount">
              </div>
              
              
            </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-info pd-x-20">Submit</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div><!-- card -->


        

        

      </div><!-- sl-pagebody -->
      
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <div id="modaldemo2" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection

@extends('admin.admin_layouts')

@section('admin_content')

    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
          <h6 class="card-body-title">Edite Brand
          </h6>
          
          <div class="table-wrapper">
            <form method="post" action="/admin/brands/{{$brand->id}}"enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                
                <div class="modal-body pd-20">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" name="name" value="{{$brand->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Logo</label>
                    <input type="file" name="logoName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Logo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Brand Logo</label>
                    <img src="{{url('/').'/'.$brand->logo}}" alt="Brand Logo" height="70px;"
                        width="80px;">
                  </div>
                  
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->


        

        

      </div><!-- sl-pagebody -->
      
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


   

@endsection

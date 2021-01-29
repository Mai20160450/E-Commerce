@extends('admin.admin_layouts')

@section('admin_content')

    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sub-Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
          <h6 class="card-body-title">Sub-Category List
            <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo2">Add New</a>
          </h6>
          
          <div class="table-wrapper">
            <form method="post" action="{{url('admin/subCategories')}}/{{$subCategory->id}}">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body pd-20">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub-Category Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$subCategory->name}}" aria-describedby="emailHelp" placeholder="sub-Category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <select class="form-control" name="category_id">
                      <option selected disabled>Categories</option>
                      @foreach ($categories as $item)
                      <option value="{{$item->id}}" @if($subCategory->category_id == $item->id) selected @endif>{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->


@endsection

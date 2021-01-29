@extends('admin.admin_layouts')

@section('admin_content')

    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
          <h6 class="card-body-title">Product List
            <a href="{{url('/admin/products/create')}}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
          </h6>
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Code</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Image</th>
                  <th class="wd-20p">Category</th>
                  <th class="wd-20p">Brand</th>
                  <th class="wd-20p">Quantity</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $key=>$item)
                  <tr>
                    <td>{{$item->code}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="{{url('/').'/'.$item->imageOne}}" alt="Brand Logo" height="70px;"width="80px;"></td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->brand->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>
                        @if($item->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                        
                    </td>
                    <td>
                      <a href="{{url('/admin/products/')}}/{{$item->id}}/edit" value="PUT" class="btn btn-sm btn-info" title="Edite"><i class="fa fa-edit"></i></a>
                      <form style="display: inline-block" action="{{url('/admin/products/')}}/{{$item->id}}" method="post" value="DELETE">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a title="Delete"><button   onclick="return confirm('Are you sure you want to Remove This Product ?');" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button></a>
                       
                      </form>
                      <a href="{{url('/admin/products/')}}/{{$item->id}}" value="PUT" title="Show" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                      @if ($item->status == 1)
                      <a href="{{url('/admin/product/')}}/{{$item->id}}/changeStatu" value="PUT" title="Active" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up"></i></a>
                      @else
                      <a href="{{url('/admin/product/')}}/{{$item->id}}/changeStatu" value="PUT" title="Inactive" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></a>
                      @endif
                      
                    </td>
                  </tr>
                @endforeach
                
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


        

        

      </div><!-- sl-pagebody -->
      
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


@endsection

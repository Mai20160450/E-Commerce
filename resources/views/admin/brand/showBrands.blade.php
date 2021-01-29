@extends('admin.admin_layouts')

@section('admin_content')

    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
          <h6 class="card-body-title">Brand List
            <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo2">Add New</a>
          </h6>
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Logo</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands as $key=>$item)
                  <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="{{url('/').'/'.$item->logo}}" alt="Brand Logo" height="70px;"
                        width="80px;"></td>
                    <td>
                      <a href="{{url('/admin/brands/')}}/{{$item->id}}/edit" value="PUT" class="btn btn-sm btn-info">Edite</a>
                      <form style="display: inline-block" action="{{url('/admin/brands/')}}/{{$item->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button  onclick="return confirm('Are you sure you want to Remove This Brand ?');" class="btn btn-sm btn-danger" >Delete</button>
                       
                      </form>
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


    <div id="modaldemo2" class="modal fade">
      <div class="modal-dialog modal-lg" style="width: 350px;" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
          <form method="post" action="{{url('admin/brands')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body pd-20">
              
              <div class="form-group">
                <label for="exampleInputEmail1">Brand Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Name">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Brand Logo</label>
                <input type="file" name="logoName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Logo">
              </div>
              
            </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-info pd-x-20">Submit</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection

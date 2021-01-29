@extends('admin.admin_layouts')

@section('admin_content')

    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Subscriber Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
          <h6 class="card-body-title">Subscriber List
            <a href="{{url('admin/deleteAll')}}" class="btn btn-sm btn-warning" style="float: right;" >Delete All</a>
          </h6>
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Subscribiing Time</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($subscribers as $key=>$item)
                  <tr>
                    <td><input type="checkbox" name="delete[]">  {{$key +1}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                      <a id="delete" href="{{url('/admin/subscribers/')}}/{{$item->id}}/delete"  class="btn btn-sm btn-danger">Delete</a>
                      
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

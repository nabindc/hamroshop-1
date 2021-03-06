@extends('admin.adminLayouts.admin_design')

@section('content')

<div class="page-breadcrumb">
              <div class="row">
                  <div class="col-5 align-self-center">
                      <h4 class="page-title">View All Categories</h4>
                      <div class="d-flex align-items-center">

                      </div>
                  </div>
                  <div class="col-7 align-self-center">
                      <div class="d-flex no-block justify-content-end align-items-center">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item">
                                      <a href="{{route('admin.dashboard')}}">Home</a>
                                  </li>
                                  <li class="breadcrumb-item active" aria-current="page">Category</li>
                              </ol>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Container fluid  -->
          <!-- ============================================================== -->
          <div class="container-fluid">
              <!-- ============================================================== -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <!-- basic table -->
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Categories Details</h4>

                              @if(Session::has('flash_message_success'))
                                  <div class="alert alert-success alert-block">
                                       <button type="button" class="close" data-dismiss="alert">x</button>
                                      <strong>{!! session('flash_message_success') !!}</strong>
                                  </div>
                                  @endif

                              @if(Session::has('flash_message_warning'))
                                  <div class="alert alert-warning alert-block">
                                      <button type="button" class="close" data-dismiss="alert">x</button>
                                      <strong>{!! session('flash_message_warning') !!}</strong>
                                  </div>
                              @endif


                              <div class="table-responsive">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Name</th>
                                              <th>Category Level</th>
                                              <th>Description</th>
                                              <th>Slug</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                     <tbody>
                                         @foreach($categories as $category)
                                             <tr>
                                                 <td>{{$loop->index +1}}</td>
                                                 <td>{{$category->name}}</td>
                                                 <td>
                                                     @if($category->parent_id == 0)
                                                         <span class="badge badge-warning">{{ 'Main Category' }}</span>
                                                     @endif
                                                     @foreach($categories as $c)
                                                         @if($c->id == $category->parent_id)
                                                             <span class="badge badge-primary">{{ $c->name }}</span>
                                                         @endif
                                                     @endforeach
                                                 </td>
                                                 <td>{!! htmlspecialchars_decode($category->description) !!}</td>
                                                 <td>{{$category->slug}}</td>
                                                 <td>
                                                     <a  href="{{route('category.edit', $category->id)}}" class="btn btn-success">
                                                         <i class="fa fa-edit"></i>
                                                     </a>
                                                     <a id="delCat" href="{{route('category.delete', $category->id)}}" class="btn btn-danger">
                                                         <i class="fa fa-trash"></i>
                                                     </a>
                                                 </td>
                                             </tr>
                                             @endforeach
                                     </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Category Level</th>
                                          <th>Description</th>
                                          <th>Slug</th>
                                          <th>Actions</th>
                                      </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- ============================================================== -->
              <!-- End PAge Content -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Right sidebar -->
              <!-- ============================================================== -->
              <!-- .right-sidebar -->
              <!-- ============================================================== -->
              <!-- End Right sidebar -->
              <!-- ============================================================== -->
          </div>

@endsection

@section('css')
    <link href="{{asset('public/adminpanel/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endsection

@section('script')
    <script src="{{asset('public/adminpanel/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('public/adminpanel/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#delCat").click(function(){
               if(confirm('Are You Sure, You Want To Delete This Category')){
                   return true;
               }
               return false;
            });
        });
    </script>
    @endsection
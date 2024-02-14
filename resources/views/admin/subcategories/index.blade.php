@extends('layouts.admin')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SUB CATEGORY</h1>
                    </div>
                    {{--modal popup button--}}
                   <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-end" data-bs-target="#categoryModal" data-bs-toggle="modal" >
                      + &nbsp;Add
                    </button>
                   </div>
                    


                    {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All sub-category list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>Sub Category Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategory as $key => $sub_cat)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $sub_cat->category->category_name }}</td>
                                                <td>{{ $sub_cat->subcategory_name }}</td>
                                                <td>{{ $sub_cat->subcategory_slug }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"  data-id="{{$sub_cat->id}}" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                                                      <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="{{route('category.destroy')}}" method="POST" >
                                                      @csrf
                                                      <input type="hidden" name="hidden" value="{{$category->id}}">
                                                      <button id="delete" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                      </button>
                                                    </form> --}}
                                                    <a href="{{route('category.destroy',$sub_cat->id)}}" id="delete" class="btn btn-danger">
                                                      <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    {{------main modal------}}
    {{------add sub category modal-------}}
    <div class="modal fade" id="categoryModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title">ADD NEW SUB CATEGORY</div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="hold-transition login-page m-auto" style="width: 25rem; height: 19rem">
                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                      <div class="card-header text-center">
                        <a href="#" class="h1"></a>
                      </div>
                      <div class="card-body">
                        <form action="{{route('subcategory.store')}}" method="post">
                            @csrf
                            <div>
                                <label for="subCategory">Select Category</label>
                                <div class="input-group">
                                    <select name="category_id" class="form-control" id="">
                                        <option value="">Select Category</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="subcategoryName">Sub Category Name</label>
                          <div class="input-group mb-3">
                            <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="Sub Category Name">
                            
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-list"></span>
                              </div>
                            </div>
                            @error('subcategory_name')
                              <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                          </div>
                            </div>
                          <div class="row">
                            <div class="col-8"></div>
                            <!-- /.col -->
                            <div class="col-4">
                              <button type="submit" class="btn btn-primary btn-block">Add</button>
                            </div>
                            <!-- /.col -->
                          </div>
                        </form>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.login-box -->
                </div>
            </div>
            
      
          </div>
        </div>
      </div>

      {{------main modal------}}
      {{-----edit subcategory modal-----}}
      <div class="modal fade" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title"> UPDATE CATEGORY</div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="hold-transition login-page m-auto" style="width: 25rem; height: 15rem">
                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                      <div class="card-header text-center">
                        <a href="#" class="h1"></a>
                      </div>
                      <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <label for="categoryName">Category Name</label>
                          <div class="input-group mb-3">
                            <input type="text" id="cat_name" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Category Name">
                            @error('category_name')
                              <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-list"></span>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" id="hidden_id" name="id">
                          <div class="row">
                            <div class="col-8"></div>
                            <!-- /.col -->
                            <div class="col-4">
                              <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                            <!-- /.col -->
                          </div>
                        </form>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.login-box -->
                </div>
            </div>
            
      
          </div>
        </div>
      </div>

@endsection

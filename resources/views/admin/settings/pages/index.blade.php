@extends('layouts.admin')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PAGES</h1>
                    </div>
                    {{--modal popup button--}}
                   <div class="col-sm-6">
                    <a href="#" class="btn btn-primary float-end" >
                      + &nbsp;Add
                    </a>
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
                                <h3 class="card-title">All category list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Page Name</th>
                                            <th>Page Title</th>
                                            <th>Page Description</th>
                                            <th>Page Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $key => $page)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $page->page_name }}</td>
                                                <td>{{ $page->category_slug }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"  data-id="{{$page->id}}" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                                                      <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="{{route('category.destroy')}}" method="POST" >
                                                      @csrf
                                                      <input type="hidden" name="hidden" value="{{$category->id}}">
                                                      <button id="delete" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                      </button>
                                                    </form> --}}
                                                    <a href="{{route('category.destroy',$page->id)}}" id="delete" class="btn btn-danger">
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

@endsection

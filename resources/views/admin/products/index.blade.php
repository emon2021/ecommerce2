@extends('layouts.admin')
@section('admin-content')
    @push('css')
        {{-- ---------next and previous button custom css--------- --}}
        <style>
            .paginate_button {
                background: #0069d9;
                color: white;
                padding: 10px;
                margin: 0.40rem;
                border-radius: 0.25rem;
            }
        </style>
        {{-- ---Yajra DataTable css link---- --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"
            integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
       
    @endpush
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products Table</h1>
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

                        <div class="card" style="width: 100%; overflow:scroll">
                            <div class="card-header" <h3 class="card-title"> All Product list here </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="yTable" class="table table-bordered table-striped " style="widows: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Subcategory</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Pickup Point</th>
                                            <th>Warehouse</th>
                                            <th>Stock Quantity</th>
                                            <th>Color</th>
                                            <th>Thumbnail</th>
                                            <th>Multiple Image</th>
                                            <th>Status</th>
                                            <th>Today Deal</th>
                                            <th>Featured</th>
                                            <th>Cash On Delivery</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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


    {{-- ----product delete form------ --}}
    <form action="" id="delete_form" method="delete">
        @csrf @method('DELETE')
    </form>


    @push('script')
        {{-- ------Yajra DataTable js script link------- --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
            integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Include DataTables JS -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <!-- Include DataTables Buttons JS -->
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        

        {{-- brand data showing with yajra DataTable  AJAX CODE --}}
        <script>
            $(document).ready(function() {
                //  start ajax syntax with a function()
                $(function() {
                    //  getting the original table and replace it with yajra DataTable({json data});
                    yTable = $('#yTable').DataTable({
                        //  default data for all columns
                        columnDefs: [{
                            'defaultContent': '-',
                            'targets': '_all'
                        }],
                        //  it's showing the processing message
                        processing: true,
                        //  it's working on serverside
                        serverSide: true,
                        //  getting the route using ajax and declare request type
                        ajax: {
                            url: "{{ route('product.index') }}",
                            type: 'GET',
                        },
                        //  push data to all the table columns
                        columns: [
                            //  this first column is defined the auto increment too column
                            {
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'code',
                                name: 'code',
                            },
                            {
                                data: 'subcategory_name',
                                name: 'subcategory_name',
                            },
                            {
                                data: 'category_name',
                                name: 'category_name',
                            },
                            {
                                data: 'brand_name',
                                name: 'brand_name',
                            },
                            {
                                data: 'pickup_point_name',
                                name: 'pickup_point_name',
                            },
                            {
                                data: 'warehouse',
                                name: 'warehouse',
                            },
                            {
                                data: 'stock_quantity',
                                name: 'stock_quantity',
                            },
                            {
                                data: 'color',
                                name: 'color',
                            },
                            {
                                data: 'thumbnail',
                                name: 'thumbnail',
                            },
                            {
                                data: 'images',
                                name: 'images',
                            },
                            {
                                data: 'status',
                                name: 'status',
                                render: function(data){
                                    if(data == null)
                                    {
                                        return  '<span class="badge badge-danger">Inactive</span>';
                                    }else{
                                        return   '<span class="badge badge-success">Active</span>';
                                    }
                                }
                            },
                            {
                                data: 'today_deal',
                                name: 'today_deal',
                                render: function(data){
                                    if(data == null)
                                    {
                                        return  '<span class="badge badge-danger">Inactive</span>';
                                    }else{
                                        return   '<span class="badge badge-success">Active</span>';
                                    }
                                }
                            },
                            {
                                data: 'featured',
                                name: 'featured',
                                render: function(data){
                                    if(data == null)
                                    {
                                        return  '<span class="badge badge-danger">Inactive</span>';
                                    }else{
                                        return   '<span class="badge badge-success">Active</span>';
                                    }
                                }
                            },
                            {
                                data: 'cash_on_delivery',
                                name: 'cash_on_delivery',
                                render: function(data){
                                    if(data == null)
                                    {
                                        return  '<span class="badge badge-danger">Inactive</span>';
                                    }else{
                                        return   '<span class="badge badge-success">Active</span>';
                                    }
                                }
                            },
                            //  here added orderable and searchable property to make table orderable and searchable
                            {
                                data: 'action',
                                name: 'action',
                                orderable: true,
                                searchable: true
                            },
                        ],
                        // dom:'Bfrtip',
                        // buttons:['csv','pdf'],
                    });
                });
                //  here end data pushing using yajra datatables
            });
        </script>
        
        <!-------------------custom script------------------->
        
    @endpush
@endsection

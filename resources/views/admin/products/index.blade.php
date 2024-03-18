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
                            <div class="card-header">
                                 <h3 class="card-title mb-3" style="margin-botton: 5px"> All Product list here </h3>
                                 
                            </div>
                            <div class="filtering mt-2 ml-2">
                                <div class="container m-auto ml-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="category">Category</label>
                                            <select name="category_id" class="form-control realtime_filter" id="category_id">
                                                <option value="" >All</option>
                                                @foreach ($category as $cat)
                                                    <option value="{{$cat->id}}"> {{$cat->category_name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category">Brand</label>
                                            <select name="brand_id" class="form-control realtime_filter" id="brand_id">
                                                <option value="">All</option>
                                                @foreach($brands as $brand)
                                                   <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="category">Warehouse</label>
                                            <select name="warehouse_id" class="form-control realtime_filter" id="warehouse_id">
                                                <option value="">All</option>
                                                @foreach($warehouses as $warehouse)
                                                   <option value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category">Status</label>
                                            <select name="status" class="form-control realtime_filter" id="status">
                                                <option value="">All</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                        "processing": true,
                        //  it's working on serverside
                        "serverSide": true,
                        "searching": true,
                        //  getting the route using ajax and declare request type
                        "ajax": {
                            "url": "{{ route('product.index') }}",
                            "type": 'GET',
                            "data": function(param){
                                    param.category_id = $('#category_id').val();
                                    param.brand_id = $('#brand_id').val();
                                    param.warehouse_id = $('#warehouse_id').val();
                                    param.status = $('#status').val();
                                }
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
                            },
                            {
                                data: 'today_deal',
                                name: 'today_deal',
                            },
                            {
                                data: 'featured',
                                name: 'featured',
                            },
                            {
                                data: 'cash_on_delivery',
                                name: 'cash_on_delivery',
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
        <script>
            $(document).ready(function(){
                $('body').on('click','#delete_data',function(e){
                    e.preventDefault();
                    let get_route = $(this).attr('href'); //    get route
                    let set_route = $('#delete_form').attr( "action", get_route );  //set attr action to our form from href attribute of button
                    // SweetAlert confirmation
                    Swal.fire({
                        title: "Are you want to Delete?",
                        text: "",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#23D160",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If confirmed, submit the form
                            $('#delete_form').submit();
                        } else {
                            // Otherwise, show a message
                            Swal.fire({
                                title: "Your Data is Safe!",
                                text: "",
                                icon: "info"
                            });
                        }
                    });
                    //____-end of sweetalert2------

                    $('#delete_form').submit(function(e){
                        e.preventDefault();
                        $get_action = $(this).attr('action'); //    get route from action attribute
                        $formData = new FormData($(this)[0]);   //  get all data from the form
                        $.ajax({
                            url:$get_action,
                            method:"POST",
                            data: $formData,
                            contentType: false,
                            processData: false,
                            success: function(response){
                                yTable.ajax.reload(); //     refresh table after deleting
                                toastr.success(response);   //      show response in toster
                            },
                        });
                    });
                });
                //________-end of delete button click event-----------

                //________status.change________
                $('body').on('click','.status',function(e){
                    e.preventDefault();
                    let status_id = $(this).data('id');
                    $.ajax({
                        type:'GET',
                        url:'products/status/' + status_id,
                        success:function(response){
                            yTable.ajax.reload();
                            toastr.success(response);
                        }
                    });
                });
                //________featured.change________
                $('body').on('click','.featured',function(e){
                    e.preventDefault();
                    let freatured = $(this).data('id');
                    $.ajax({
                        type:'GET',
                        url:'products/featured/' + freatured,
                        success:function(response){
                            yTable.ajax.reload();
                            toastr.success(response);
                        }
                    });
                });
                //________today_deal.change________
                $('body').on('click','.today_deal',function(e){
                    e.preventDefault();
                    let today_deal = $(this).data('id');
                    $.ajax({
                        type:'GET',
                        url:'products/today-deal/' + today_deal,
                        success:function(response){
                            yTable.ajax.reload();
                            toastr.success(response);
                        }
                    });
                });
                //________cash on delivery.change________
                $('body').on('click','.cash_on_delivery',function(e){
                    e.preventDefault();
                    let cash_on = $(this).data('id');
                    $.ajax({
                        type:'GET',
                        url:'products/cash-on-delivery/' + cash_on,
                        success:function(response){
                            yTable.ajax.reload();
                            toastr.success(response);
                        }
                    });
                });

                //______realtime filtering____
                $('body').on('change','.realtime_filter', function(){
                    yTable.ajax.reload();
                });


            });
        </script>
        
    @endpush
@endsection

@extends('layouts.admin')
@section('admin-content')
    @push('css')
        {{-- ---Yajra DataTable css link---- --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"
            integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    @endpush
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>COUPON'S TABLE</h1>
                    </div>
                    {{-- modal popup button --}}
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary float-end" data-bs-target="#categoryModal"
                            data-bs-toggle="modal">
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
                                <h3 class="card-title">All Coupon list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="yTable" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Amount</th>
                                            <th>Coupon Type</th>
                                            <th>Coupon Duration</th>
                                            <th>Coupon Status</th>
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


    {{-- ----main modal---- --}}
    {{-- ----add Child category modal----- --}}
    <div class="modal fade" id="categoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">ADD NEW COUPON</div>
                    <button type="button" id="btn_close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="hold-transition login-page m-auto" id="div_body" style="width: 25rem; height: 34rem">
                        <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card card-outline card-primary">
                                <div class="card-header text-center">
                                    <a href="#" class="h1"></a>
                                </div>
                                <div class="card-body">
                                    <form id="form_submit" action="{{ route('coupon.store') }}" method="post">
                                        @csrf

                                        <div>
                                            <label for="couponName">Coupon Code</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="coupon_code"
                                                    class="form-control"
                                                    placeholder="Coupon Code">

                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-list"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="couponName">Coupon Type</label>
                                            <div class="input-group mb-3">
                                                <select name="coupon_type" class="form-control">
                                                    <option>Select Coupon Type</option>
                                                    <option value="1">Fixed</option>
                                                    <option value="2">Percentage</option>
                                                </select>

                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-list"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="couponName">Coupon Amount</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="coupon_amount"
                                                    class="form-control "
                                                    placeholder="Coupon Amount">

                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-list"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="couponName">Coupon Duration</label>
                                            <div class="input-group mb-3">
                                                <input type="date" name="coupon_valid_date"
                                                    class="form-control ">

                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-list"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="input-group mb-3">
                                                <input type="checkbox" name="coupon_status" value=1 >
                                                <span style="margin-left: 10px">Active Coupon</span>
                                            </div>
                                        </div>
                                        <div id="errors" style="color: darkred">

                                        </div>
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <!-- /.col -->
                                            <div class="col-4">
                                                <button type="submit" id="submit_btn"
                                                    class="btn btn-primary btn-block">Add</button>
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

    {{-- ----main modal---- --}}
    {{-- ---edit coupon modal--- --}}
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"> UPDATE coupon</div>
                    <button type="button" id="edit_close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal_body">

                </div>


            </div>
        </div>
    </div>

    <form action="" id="delete_form" method="POST">
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

        {{-- coupon data showing with yajra DataTable  AJAX CODE --}}
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
                            url: "{{ route('coupon.index') }}",
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
                                data: 'coupon_code',
                                name: 'coupon_code'
                            },
                            {
                                data: 'coupon_amount',
                                name: 'coupon_amount'
                            },
                            {
                                data: 'coupon_type',
                                name: 'coupon_type',
                                render:  function(data, type, full, meta) {
                                    if(data == '1'){
                                        return '<span class="text-success font-weight-bold">Fixed</span>';
                                    }else if(data == '2'){
                                        return '<span class="text-success font-weight-bold">Percentage</span>';
                                    }
                                },
                            },
                            {
                                data: 'coupon_valid_date',
                                name: 'coupon_valid_date'
                            },
                            {
                                data: 'coupon_status',
                                name: 'coupon_status',
                                render:  function(data, type, full, meta) {
                                    if(data == null){
                                        return '<span class="badge badge-danger">Inactive</span>';
                                    }else if(data == '1'){
                                        return '<span class="badge badge-success">Active</span>';
                                    }
                                },
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

        {{-- -------coupon crud operation's ajax script-------- --}}
        <script>
            $(document).ready(function() {
                //  form submit using ajax request
                $('body').on('submit', '#form_submit', function(e) {
                    e.preventDefault();
                    let get_route = $(this).attr('action'); //  get form action url
                    let get_input = new FormData($(this)[0]); // create a new fromData object and pass
                    //  ajax request sending
                    $.ajax({
                        type: "POST",
                        url: get_route, // set the file location path
                        processData: false,
                        contentType: false,
                        data: get_input, // pass the filled form data list to ajax
                        success: function(response) {
                            //  toastr notification showing without reload
                            toastr.success(response);
                            //  data delete form reset here
                            $('#form_submit')[0].reset();
                            $('#btn_close').trigger('click');
                            // reload table using yajra datatable
                            yTable.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // Display error message next to input field
                                $('#errors').text(value[0]);
                            });
                        },
                    });
                });
                //____-/end of form submitting part____

                //_____coupon data deletion ajax request____
                $('body').on('click', '#delete_data', function(e) {
                    e.preventDefault();
                    let get_route = $(this).attr('href');
                    let set_route = $('#delete_form').attr('action', get_route);
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
                });
                //_____Handle form submission to delete data___
                $('body').on('submit','#delete_form',function(e){
                    e.preventDefault();
                    let get_action = $(this).attr('action');
                    let formData = new FormData($(this)[0]);
                    $.ajax({
                        url : get_action,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:function(response){
                            //  toastr alert to delete data
                            toastr.success(response);
                            // reload datatable after deleting data
                            yTable.ajax.reload();
                        },
                    });
                });
                //______-/coupon data deletion ajax request end__________

                // //______coupon data edition ajax request__________
                // $('body').on('click','.edit',function(e){
                //     e.preventDefault();
                //     let get_id = $(this).data('id');
                //     $.ajax({
                //         url: 'edit/' + get_id,
                //         type: 'get',
                //         success: function(response) {
                //             $('#modal_body').html(response);
                //         }
                //     });
                // });
                // //________-/coupon data retrive end_____
                // $('body').on('submit','#update_form',function(e){
                //     e.preventDefault();
                //     let get_update_route = $(this).attr('action');
                //     let updateForm = new  FormData($(this)[0]) ;
                //     $.ajax({
                //        method:'post',
                //        url:get_update_route ,
                //        data:updateForm ,
                //        processData:false,
                //        contentType:false,
                //        success: function(response) {
                //             //  toastr notification showing without reload
                //             toastr.success(response);
                //             //  data delete form reset here
                //             $('#update_form')[0].reset();
                //             $('#edit_close').trigger('click');
                //             // reload table using yajra datatable
                //             yTable.ajax.reload();
                //         },
                //         error: function(xhr, status, error) {
                //             var errors = xhr.responseJSON.errors;
                //             $.each(errors, function(key, value) {
                //                 // Display error message next to input field
                //                 $('#errors_up').text(value[0]);
                //             });
                //         },
                //     });
                // });
            });
        </script>
    @endpush
@endsection

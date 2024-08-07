@extends('layouts.admin')
@section('admin-content')

@push('css')
{{-----Yajra DataTable css link------}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-----------next and previous button custom css-----------}}
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
                        <h1>CHILD CATEGORY</h1>
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
                                <h3 class="card-title">All child-category list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="yTable" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>Sub-Category Name</th>
                                            <th>Child-Category Name</th>
                                            <th>Child-Category Slug</th>
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


    {{------main modal------}}
    {{------add Child category modal-------}}
    <div class="modal fade" id="categoryModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title">ADD NEW Child CATEGORY</div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="hold-transition login-page m-auto" id="div_body" style="width: 25rem; height: 19rem">
                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                      <div class="card-header text-center">
                        <a href="#" class="h1"></a>
                      </div>
                      <div class="card-body">
                        <form id="form_submit" action="{{route('childcategory.store')}}" method="post">
                            @csrf
                            <div class="">
                                <label for="subCategory">Select Category</label>
                                <div class="input-group">
                                    <select name="category_id" class="form-control" id="">
                                        <option id="select_cat" value="">Select Category</option>
                                        @foreach($category as $cat)
                                            <option class="selected" value="{{$cat->id}}">{{$cat->category_name}}</option>
                                          
                                        @endforeach
                                    </select>
                                   
                                </div>
                            </div>
                            <div id="sub_cat" class="">

                            </div>
                            <div>
                                <label for="subcategoryName">Child Category Name</label>
                          <div class="input-group mb-3">
                            <input type="text" name="childcategory_name" class="form-control @error('childcategory_name') is-invalid @enderror" placeholder="Child Category Name">
                            
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-list"></span>
                              </div>
                            </div>
                            @error('childcategory_name')
                              <strong class="text text-danger">{{$message}}</strong>
                            @enderror
                          </div>
                            </div>
                            <div id="errors" style="color: darkred">

                            </div>
                          <div class="row">
                            <div class="col-8"></div>
                            <!-- /.col -->
                            <div class="col-4">
                              <button type="submit" id="submit_btn" class="btn btn-primary btn-block">Add</button>
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
            <div id="modal_body">
                
            </div>
            
      
          </div>
        </div>
      </div>

      <form action="" id="delete_form" method="delete">
        @csrf @method('DELETE')
      </form>


@push('script')

{{--------Yajra DataTable js script link---------}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- Include DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    
{{-- child category data showing with yajra DataTable  AJAX CODE --}}
<script>
    $(document).ready(function(){
      //  start ajax syntax with a function()
      $(function(){
        //  getting the original table and replace it with yajra DataTable({json data});
        yTable = $('#yTable').DataTable({
          //  default data for all columns
          columnDefs:[{
            'defaultContent':'-',
            'targets':'_all'
          }],
          //  it's showing the processing message
          processing:true,
          //  it's working on serverside
          serverSide:true,
          //  getting the route using ajax and declare request type
          ajax:{
            url:"{{route('childcategory.index')}}",
            type:'GET',
          },
          //  push data to all the table columns
          columns:[
            //  this first column is defined the auto increment too column
            {data:'DT_RowIndex', name:'DT_RowIndex'},
            {data:'category_name', name:'category_name'},
            {data:'subcategory_name', name:'subcategory_name'},
            {data:'childcategory_name', name:'childcategory_name'},
            {data:'childcategory_slug', name:'childcategory_slug'},
            //  here added orderable and searchable property to make table orderable and searchable
            {data:'action', name:'action',orderable:true,searchable:true},
          ],
          // dom:'Bfrtip',
          // buttons:['csv','pdf'],
        });
      });
      //  here end data pushing using yajra datatables
    });
</script>
{{----------------show subcategory after selecting category option------------------}}
<script>
  $(document).ready(function(){
    
    $(document).on('click','.selected',function(){
      //  adding css to form body
        $('#div_body').css({
          'height':'23rem'
        });
        //  select category
        $('#select_cat').click(function(){
          $('#sub_cat').addClass('d-none');
            $('#div_body').css({
            'height':'19rem'
          });
        });
        //  get category_id from category option
        let get_value = $(this).val();
        //  ajax start
        $.ajax({
          url: "{{route('sub_show.child')}}",
          type: 'get',
          //   passing category_id for fetching subcategory under this category
          data: {
            id: get_value,
          },
          //  success response from ChildCategoryController from fetch_sub() method
          success:function(response){
            $('#sub_cat').removeClass('d-none')
           // pushing response to html #sub_cat id
            $('#sub_cat').html(response);
          },
        });
      });
  });
</script>

{{------------data delete with ajax and yajra datatables------------}}
<script>
    $(document).ready(function(){
        $(document).on('click','#delete_data',function(e){
            e.preventDefault();
            let get_route = $(this).attr('href');
            let set_route = $('#delete_form').attr('action',get_route);
            // SweetAlert confirmation
            Swal.fire({
                title: "Are you sure you want to delete?",
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
        
        // Handle form submission
        $('#delete_form').submit(function(e){
            e.preventDefault();
            //  get route from action attribute
            let get_action_route = $(this).attr('action');
            //  serialize data for delete
            let serialize_data = $(this).serialize();
            //  ajax request giving for delete data without reload
            $.ajax({
                url: get_action_route,
                type: 'post', 
                async: false,
                data: serialize_data,
                success: function(response){
                  //  toastr notification showing without reload
                  toastr.warning(response);
                  //  data delete form reset here
                    $('#delete_form')[0].reset();
                    // reload table using yajra datatable
                    yTable.ajax.reload();
                } 
            });
        });
    });
</script>
{{----------------form submission without reload using ajax----------------}}
<script>
  $(document).ready(function(){
      // Handle form submission
      $('#form_submit').submit(function(e){
            e.preventDefault();
            //  get route from action attribute
            let get_action_route = $(this).attr('action');
            //  serialize data for delete
            let serialize_data = $(this).serialize();
            //  ajax request giving for delete data without reload
            $.ajax({
                url: get_action_route,
                type: 'post', 
                async: false,
                data: serialize_data,
                success: function(response){
                  //  toastr notification showing without reload
                  toastr.success(response);
                  //  data delete form reset here
                    $('#form_submit')[0].reset();
                    // reload table using yajra datatable
                    yTable.ajax.reload();
                    $('#select_cat').trigger('click');
                    $('.btn-close').trigger('click');
                },
                error:function(xhr,status,error){
                  var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    // Display error message next to input field
                    $('#errors').text(value[0]);
                });
                },
            });
        });
    });
</script>
{{----------------retrieve data for edit using ajax----------------}}
<script>
  $(document).ready(function(){
    $(document).on('click','.edit',function(){
      $('#div_body').css({'height':'25rem'});
      let get_id = $(this).data('id');
      $.ajax({
        url: 'edit/' + get_id,
        type: 'get',
        success: function(response){
          $('#modal_body').html(response);
        },
      });
    });
  });
</script>
{{----------------form updated without reload using ajax----------------}}
<script>
  $(document).ready(function(){
    $(document).on('click','#update_btn',function(){
      // Handle form submission
      $('#update_form').submit(function(e){
            e.preventDefault();
            //  get route from action attribute
            let get_action_route = $(this).attr('action');
            //  serialize data for delete
            let serialize_data = $(this).serialize();
            //  ajax request giving for delete data without reload
            $.ajax({
                url: get_action_route,
                type: 'post', 
                async: false,
                data: serialize_data,
                success: function(response){
                  //  toastr notification showing without reload
                  toastr.success(response);
                  //  data delete form reset here
                    $('#update_form')[0].reset();
                    // reload table using yajra datatable
                    yTable.ajax.reload();
                    $('.btn-close').trigger('click');
                },
                error:function(xhr,status,error){
                  var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    // Display error message next to input field
                    $('#errors_up').text(value[0]);
                });
                },
            });
        });
    });
  });
</script>
  










@endpush
   

@endsection

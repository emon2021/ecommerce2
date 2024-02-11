<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.css">
   <!-------sweetalert2.css------->
   <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/sweetalert2/sweetalert2.min.css">
   <!-------toastr.css------->
   <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>


  @auth
      @include('layouts.admin-partial.topbar')
      @include('layouts.admin-partial.sidebar')  
  @endauth

   @yield('admin-content')

  @auth
    @include('layouts.admin-partial.footer')
  @endauth

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="{{asset('public/backend')}}/plugins/jquery/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
{{-- <script src="{{asset('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- ChartJS -->
<script src="{{asset('public/backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-------toaster.js------->
<script src="{{asset('public/backend')}}/plugins/toastr/toastr.min.js"></script>
<!-------sweetalert2.js------->
<script src="{{asset('public/backend')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend')}}/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('public/backend')}}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend')}}/dist/js/pages/dashboard.js"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!------------For Delete alert notification sweetalert2------------->
<script>
  $(document).ready(function() {
      $(document).on('click', '#delete', function(e) {
          e.preventDefault();

          let link = $(this).attr('href');
          Swal.fire({
                      title: "Are you want to delete?",
                      text: "",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#23D160",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "OK"
                  }).then((result) => {
                      if (result.isDismissed) {
                          Swal.fire({
                              title: "Safe Data!",
                              text: "",
                              icon: "warning"
                          });
                      }else if(result.isConfirmed){
                        window.location.href = link;
                      }
                  });
      });
  });
</script>
<!------------For Logout alert notification sweetalert2------------->
<script>
  $(document).ready(function() {
      $(document).on('click', '#logout', function(e) {
          e.preventDefault();

          let link = $(this).attr('href');
          Swal.fire({
                      title: "Are you want to logout?",
                      text: "",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#23D160",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "OK"
                  }).then((result) => {
                      if (result.isDismissed) {
                          Swal.fire({
                              title: "Safe Data!",
                              text: "",
                              icon: "warning"
                          });
                      }else if(result.isConfirmed){
                        window.location.href = link;
                      }
                  });
      });
  });
</script>
{{-- -----toaster alert message showing----- --}}
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':

                toastr.options.timeOut = 10000;
                toastr.info("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();
                break;
            case 'success':

                toastr.options.timeOut = 10000;
                toastr.success("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();

                break;
            case 'warning':

                toastr.options.timeOut = 10000;
                toastr.warning("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();

                break;
            case 'error':

                toastr.options.timeOut = 10000;
                toastr.error("{{ Session::get('message') }}");
                var audio = new Audio('audio.mp3');
                audio.play();

                break;
        }
    @endif
</script>
{{-- category data retrive for update category using jquery, ajax --}}
<script>
  $(document).ready(function(){
    //___get the clickable button__/
    $('.edit').click(function(){
      //____get the current id__/
      let cat_id = $(this).data('id');
      //____ajax get method___/
      $.get(
        //____URL to entering the controller__/
        "edit/" + cat_id,
        function (response) {
          //___appends value to input field____/
          $('#cat_name').val(response.category_name);
          $('#hidden_id').val(response.id);
        },
      );
    });
  });
</script>

</body>
</html>

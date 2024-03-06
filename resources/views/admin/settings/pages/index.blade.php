@extends('layouts.admin')

@section('admin-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PAGES</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('pages.create') }}" class="btn btn-primary float-end">
                        + Add New Page
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All pages list here</h3>
                        </div>
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
                                        <td>{{ $page->page_title }}</td>
                                        <td>{{ $page->page_description }}</td>
                                        <td>{{ $page->page_position }}</td>
                                        <td>
                                            <a href="{{route('pages.edit',$page->id)}}" class="btn btn-primary edit" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('pages.destroy',$page->id)}}" class="btn btn-danger delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<form action="" id= "deleteForm" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('body').on('click', '.delete', function(event) {
            event.preventDefault();
            let get_route = $(this).attr('href');
            $('#deleteForm').attr('action', get_route);

            Swal.fire({
                title: "Are you sure?",
                text: "You want to Delete",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#23D160",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteForm').submit();
                } else {
                    Swal.fire({
                        title: "Your Data is Safe!",
                        text: "",
                        icon: "info"
                    });
                }
            });
        });

        $('#deleteForm').submit(function(e) {
            e.preventDefault();
            let get_action = $(this).attr('action');
            let get_data = new FormData($(this)[0]);
            $.ajax({
                url: get_action,
                type: 'POST',
                processData: false,
                contentType: false,
                data: get_data,
                success: function(response) {
                    location.reload(); // Reload the page after successful deletion
                },
                error: function(xhr, status, error) {
                    alert('Error Occurred! Please Try Again Later');
                }
            });
        });
    });
</script>
@endpush

@extends('layouts.admin')
@section('admin-content')
    <section class="content">
        <div class="container m-auto">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" id="changed" action="{{ route('admin.pass_changed') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="oldPassword">Current Password</label>
                                    <input type="password" name="old_pass"
                                        class="form-control @error('old_pass') is-invalid @enderror" id=""
                                        placeholder="Current Password">
                                    @error('old_pass')
                                        <strong style="color:darkred">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <input type="hidden" name="hidden_id" value="{{ Auth::user()->id }}">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id=""
                                        placeholder="New Password">
                                    @error('password')
                                        <strong style="color:darkred">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <strong style="color:darkred">{{ $message }}</strong>
                                    @enderror
                                    <div id="errors" style="color: darkred">

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Change</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="">

                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    @push('script')
        <script>
            $('body').on('submit', '#changed', function(e) {
                e.preventDefault();
                let get_actoin = $(this).attr('action');
                let get_data = new FormData($(this)[0]);
                $.ajax({
                    url: get_actoin,
                    type: 'post',
                    async: false,
                    processData: false,
                    contentType: false,
                    data: get_data,
                    success: function(response) {
                        
                        if(response == 'Password Mismatched!'){
                            //  toastr notification showing without reload

                            toastr.error(response); //  if password doesn't match show this notification
                        }else{
                            //  redirecting admin.loginView route after logout
                            window.location.href = "{{route('admin.loginView')}}";
                        }
                        
                    },
                    error: function(xhr, status, failed) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Display error message next to input field
                            $('#errors').text(value[0]);
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection

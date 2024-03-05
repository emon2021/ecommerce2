@extends('layouts.admin')
@section('admin-content')
    <div class="container m-auto">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{route('smtp.update',$smtp->id)}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-info">
                            <h2 class="" >SMTP Settings</h2>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="brandName">Mail Mailer</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="mailer" value="{{$smtp->mailer}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Mail Host</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="host" value="{{$smtp->host}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Mail Port</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="port" value="{{$smtp->port}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Mail Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" value="{{$smtp->username}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Mail Password</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="password" value="{{$smtp->password}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                <div class="input-group mb-3">
                                    <button class=" btn btn-info">
                                        Update
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    
@endsection

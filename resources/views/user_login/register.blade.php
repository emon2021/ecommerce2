@extends('layouts.app')
@section('content')
  <section class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{route('user.register')}}" method="POST">
                    @csrf 

                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name</label>
                                <input class="mb-0" type="text" name="fname" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0" type="text" name="lname" placeholder="Last Name">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input class="mb-0" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0" type="submit">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </section>  
@endsection
@extends('layouts.app')
@section('content')
<section class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="{{route('user.login')}}" method="POST" >
                    @csrf 

                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email Address">
                                @error('email')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0 @error('password') is-invalid @enderror" type="password"  name="password" placeholder="Password">
                                @error('password')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            @if(session()->has('loginError'))
                            <div class="d-block" style="width:100%;padding-left: 20px; color:darkred">
                                <strong>{{session('loginError')}}</strong>
                            </div>
                            @endif
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0" type="submit">Login</button>
                            </div>
                            <div class="col-md-12">
                                <div class="row ">
                                    <div class="col-md-6 mt-5 text-light d-flext align-items-center justify-content-center">
                                        <a class="facebook btn" href="{{ route('auth.facebook') }}" style="background: #363f4d; color:white;"><i class="fa fa-facebook"></i>&nbsp;&nbsp; Login With Facebook</a>
                                    </div>
                                    <div class="col-md-6 mt-5 text-light d-flext align-items-center justify-content-center">
                                        <a class="facebook btn" href="{{ route('auth.google') }}" style="background: #363f4d; color:white;"><i class="fa fa-google"></i>&nbsp;&nbsp; Login With Google</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
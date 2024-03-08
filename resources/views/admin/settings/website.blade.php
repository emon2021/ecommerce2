@extends('layouts.admin')
@section('admin-content')
    <div class="container m-auto">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{route('website.update',$website->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h2 class="" >Website Settings</h2>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="brandName">Currency</label>
                                <div class="input-group mb-3">
                                    <select name="currency" class="form-control">
                                        <option value="">Select Currency</option>
                                        <option style="font-size: 1.2rem" value="1" @if($website->currency == 1) selected @endif >Taka (৳)</option>
                                        <option style="font-size: 1.2rem" value="2" @if($website->currency == 2) selected @endif >Doller ($)</option>
                                    </select>
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Phone One</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="phone_one" value="{{$website->phone_one}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Phone Two</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="phone_two" value="{{$website->phone_two}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Main E-mail</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="main_email" value="{{$website->main_email}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Support E-mail</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="support_email" value="{{$website->support_email}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="icons_logo ml-3 text-primary font-weight-bold font-italic">Logo & Favicon</h4>
                            <div>
                                <label for="brandName">Logo</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="logo" value="{{$website->logo}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Favicon</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="favicon" value="{{$website->favicon}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="address" value="{{$website->address}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="icons_logo ml-3 text-primary font-weight-bold font-italic">Social Links</h4>
                            <div>
                                <label for="brandName">Facebook</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="facebook" value="{{$website->facebook}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Twitter</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="twitter" value="{{$website->twitter}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">LinkedIn</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="linkedin" value="{{$website->linkedin}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Youtube</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="youtube" value="{{$website->youtube}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Instagram</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="instagram" value="{{$website->instagram}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                <div class="input-group mb-3">
                                    <button class=" btn btn-primary">
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

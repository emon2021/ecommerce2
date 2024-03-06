@extends('layouts.admin')
@section('admin-content')
    <div class="container m-auto">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{route('seo.update',$seo->id)}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h2 class="" >SEO Settings</h2>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="brandName">Meta Title</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="meta_title" value="{{$seo->meta_title}}"
                                        class="form-control">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="brandName">Meta Author</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="meta_author" name="meta_author" value="{{$seo->meta_author}}"
                                        class="form-control @error('meta_author') is-invalid @enderror"
                                        placeholder="Meta Author">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                    @error('meta_author')
                                        <strong class="text text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="brandName">Meta Tag</label>
                                <div class="input-group mb-3">
                                    <textarea name="meta_tag" class="form-control" cols="30" rows="3">
                                        {{$seo->meta_tag}}
                                    </textarea>
                                </div>
                                <small>Example:example1,example2,example3</small>
                                    <div><br></div>
                            </div>

                            <div>
                                <label for="brandName">Meta Description</label>
                                <div class="input-group mb-3">
                                    <textarea name="meta_description" class="form-control" cols="30" rows="3">
                                        {{$seo->meta_description}}
                                    </textarea>
                                </div>
                            </div>

                            <div>
                                <label for="brandName">Meta Keyword</label>
                                <div class="input-group mb-3">
                                    <textarea name="meta_keyword" class="form-control" placeholder="Meta Keyword" cols="30" rows="3">
                                        {{$seo->meta_keyword}}
                                    </textarea>
                                    
                                </div>
                                    <small>Example:example1,example2,example3</small>
                                    <div><br></div>
                            </div>

                            <div>
                                <label for="brandName">Google Verification</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="google_verification" name="google_verification" value="{{$seo->google_verification}}"
                                        class="form-control @error('google_verification') is-invalid @enderror"
                                        placeholder="Google Verification Code">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                    @error('google_verification')
                                        <strong class="text text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Google Analytics</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="google_analytics" name="google_analytics" value="{{$seo->google_analytics}}"
                                        class="form-control @error('google_analytics') is-invalid @enderror"
                                        placeholder="Google Analytics">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                    @error('google_analytics')
                                        <strong class="text text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="brandName">Alexa Verification</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="alexa_verification" name="alexa_verification" value="{{$seo->alexa_verification}}"
                                        class="form-control @error('alexa_verification') is-invalid @enderror"
                                        placeholder="Alexa Verification">
        
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                    @error('alexa_verification')
                                        <strong class="text text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                
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

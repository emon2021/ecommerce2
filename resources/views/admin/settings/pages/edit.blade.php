@extends('layouts.admin');
@section('admin-content')
    <div class="container m-auto">
        <div class="row p-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{route('pages.store')}}" method="post">
                    @csrf
                    
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h2>Add New Page</h2>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <label for="forPosition">Page Position:</label>
                                <div class="input-group mb-3">
                                    <select name="page_position" id="" class="form-control @error('page_position') is-invalid @enderror">
                                        <option>Select  a page position...</option>
                                        <option @if($page->page_position == 1) selected @endif value="1">Line One</option>
                                        <option @if($page->page_position == 2) selected @endif value="2">Line Two</option>
                                        <option @if($page->page_position == 3) selected @endif value="3">Line Three</option>
                                        <option @if($page->page_position == 4) selected @endif value="4">Line Four</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('page_position')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="">
                                <label for="forPosition">Page Name:</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="page_name" value="{{$page->page_name}}" placeholder="Write Page Name" class="form-control @error('page_name') is-invalid @enderror">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('page_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="">
                                <label for="forPosition">Page Title:</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="page_title" value="{{$page->page_title}}" placeholder="Write Page Title" class="form-control @error('page_title') is-invalid @enderror">
                                    
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('page_title')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="">
                                <label for="forPosition">Page Description:</label>
                                <div class="input-group mb-3">
                                   <textarea name="page_description" class="form-control textarea @error('page_description') is-invalid @enderror" placeholder="What's on your mind?">
                                    {{$page->page_description}}
                                   </textarea>
                                </div>
                                @error('page_description')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="b">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
@extends('layouts.admin');
@section('admin-content')
    <div class="container m-auto">
        <div class="row p-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="" method="post">
                    @csrf
                    
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h2>Add New Page</h2>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <label for="forPosition">Page Position:</label>
                                <div class="input-group mb-3">
                                    <select name="page_position" id="" class="form-control">
                                        <option selected>Select  a page position...</option>
                                        <option value="1">Line One</option>
                                        <option value="2">Line Two</option>
                                        <option value="3">Line Three</option>
                                        <option value="4">Line Four</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label for="forPosition">Page Name:</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="page_name" placeholder="Write Page Name" class="form-control">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label for="forPosition">Page Title:</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="page_title" placeholder="Write Page Title" class="form-control">
                                    
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label for="forPosition">Page Description:</label>
                                <div class="input-group mb-3">
                                   <textarea name="page-description" class="form-control textarea" placeholder="What's on your mind?">
                                    Write something about your page!
                                   </textarea>
                                </div>
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
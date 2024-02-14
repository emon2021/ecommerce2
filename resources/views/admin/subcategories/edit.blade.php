<div class="modal-body">
    <div class="hold-transition login-page m-auto" style="width: 25rem; height: 19rem">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('subcategory.update') }}" method="post">
                        @csrf
                        <div>
                            <label for="subCategory">Select Category</label>
                            <div class="input-group">
                                <select name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror" id="">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}"
                                            @if ($subcategory->category_id === $cat->id) selected @endif>{{ $cat->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="categoryName">Sub Category Name</label>
                            <div class="input-group mb-3">
                                <input type="text" id="cat_name" value="{{ $subcategory->subcategory_name }}"
                                    name="subcategory_name"
                                    class="form-control @error('subcategory_name') is-invalid @enderror"
                                    placeholder=" Sub Category Name">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-list"></span>
                                    </div>
                                </div>
                                @error('subcategory_name')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" id="hidden_id" value="{{ $subcategory->id }}" name="id">
                        <div class="row">
                            <div class="col-8"></div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
</div>

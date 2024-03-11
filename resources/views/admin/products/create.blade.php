@extends('layouts.admin')
@section('admin-content')
    <section class="content">
        <div class="container-fluid m-auto">
            <div class="row">
                <h1 class="form_header " style="margin-left: 16.3rem; padding: 10px;text-transform: uppercase;">Add New
                    Product</h1>
                <form action="">
                    <div class="col-md-8" style="float: left; width: 40.2rem; margin-left:15rem">

                        <div class="card card-primary" style="">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Code <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Product Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category <span style="color: red">*</span></label>
                                            <select name="category" class="form-control" id="">
                                                <option id="select" value="">Select Category</option>
                                                @foreach ($category as $cat)
                                                    <option class="category" value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Child Category <span style="color: red">*</span></label>
                                            <select name="childcategory" class="form-control" id="">
                                                <option value="">Select Child Category</option>
                                                @foreach($child as  $value)
                                                <option value="{{$value->id}}"> {{$value->childcategory_name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column ">
                                    <div class="col-md-12 float-start" id="subcat">
                                        
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand <span style="color: red">*</span></label>
                                            <select name="category" class="form-control" id="">
                                                <option value="">Select Brand</option>
                                                @foreach($brands as $brand)
                                                 <option value="{{$brand->id}}"> {{$brand->brand_name}}   </option>  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pickup Point <span style="color: red">*</span></label>
                                            <select name="childcategory" class="form-control" id="">
                                                <option value="">Select Pickup Point</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Unit <span style="color: red">*</span></label>
                                            <select name="category" class="form-control" id="">
                                                <option value="">Select Unit</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tags <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Tags" class="form-control" name="tags">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-4 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Purchase Price <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Purchase Price" name="purchase_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4  float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selling Price <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Selling Price" name="selling_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Discount Price <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Discount Price" class="form-control" name="discount_price">
                                        </div>
                                    </div>
                                </div>

                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Warehouse <span style="color: red">*</span></label>
                                            <select name="warehouse" class="form-control" id="">
                                                <option value="">Select Warehouse</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Stock <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Stock" class="form-control" name="stock">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Color <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Color" name="color" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Size <span style="color: red">*</span></label>
                                            <input type="text" placeholder="Size" class="form-control" name="size">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class=" ">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description <span style="color: red">*</span></label>
                                            <textarea name="product_description" class="textarea form-control" cols="30" rows="3">
                                                What's on your mind?
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4" style="float: right;">
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="dropiFy">Main Thumbnail <span style="color: red">*</span></label>
                                    <input type="file" name="main_thumbnail" class="dropify" id="">
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">More Images (Click to add more images) <span style="color: red">*</span></label>
                                    <input type="file" name="more_images" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">Featured Product </label>
                                    <div class="">
                                        <input type='checkbox'>
                                        
                                    </div>
                                </div>
                                <hr style="border-color:#0D7EFF">
                                <div class="form-group">
                                    <label for="dropiFy">Today Deal </label>
                                    <div class="">
                                        <input  type='checkbox'>
                                        <label for="afterLabel">&nbsp; Active</label>
                                    </div>
                                </div>
                                <hr style="border-color:#0D7EFF">
                                <div class="form-group">
                                    <label for="dropiFy">Status</label>
                                    <div class="">
                                        <input class='' type='checkbox'>
                                        <label for="afterLabel">&nbsp; Active</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@push('script')
    <script>
        $(document).ready(function(){
            $('#select').click(function(){
                $('#subcat').addClass('d-none');
            });
            $('.category').click(function(){
                $('#subcat').removeClass('d-none');
                let cat_id = $(this).val();
                $.ajax({
                    url:"{{route('product.subcategory')}}",
                    type: 'GET',
                    data: {id:cat_id},
                    success:function(response){
                        $('#subcat').html(response);
                    }
                });
            });
        });
    </script>
@endpush



@endsection

@extends('layouts.admin')
@section('admin-content')
    @push('css')
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        {{-- ----bootstrap.input.tags.css----- --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css"
            integrity="sha512-uKwYJOyykD83YchxJbUxxbn8UcKAQBu+1hcLDRKZ9VtWfpMb1iYfJ74/UIjXQXWASwSzulZEC1SFGj+cslZh7Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            #color_tag,
            #size_tag,
            #tags_tag {
                width: 100% !important;
            }

            #color_tagsinput {
                width: 285px !important
            }

            .toggle.btn.btn-success {
                width: 100px !important;
            }

            .toggle-handle.btn.btn-default {
                width: 50%;
            }

            .btn.btn-success.toggle-on {
                left: -40px;
            }

            .toggle.btn.btn-danger.off {
                width: 100px !important;
            }

            .btn.btn-danger.active.toggle-off {
                right: -37px;
            }
        </style>
    @endpush
    <section class="content">
        <div class="container-fluid m-auto">
            <div class="row">
                <h1 class="form_header " style="margin-left: 16.3rem; padding: 10px;text-transform: uppercase;">Add New
                    Product</h1>
                <form action="{{ route('product.update',$product->id) }}" id="submit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8" style="float: left; width: 40.2rem; margin-left:15rem">

                        <div class="card card-primary" style="">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div id="errors" class="alert alert-danger d-none">

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Code <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="code" value="{{ $product->code }}"
                                                class="form-control" placeholder="Product Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-4 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category <span
                                                    style="color: red">*</span></label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option id="select">Select Category</option>
                                                @foreach ($category as $cat)
                                                    <option class="category"
                                                        @if ($product->category_id == $cat->id) selected @endif
                                                        value="{{ $cat->id }}">
                                                        {{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sub Category <span
                                                    style="color: red">*</span></label>
                                            <select name="subcategory_id" class="form-control" id="subcategory_id">
                                                <option id="sub_val" disabled>Select Sub Category</option>
                                                {{-- @foreach ($subcategory as $value)
                                                    <option @if ($product->subcategory_id == $value->id) selected @endif value="{{ $value->id }}"> {{ $value->subcategory_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Child Category <span
                                                    style="color: red">*</span></label>
                                            <select name="childcategory_id" class="form-control" id="childcategory_id">
                                                <option  id="child_val" disabled>Select Child Category</option>
                                                {{-- @foreach ($child as $item)
                                                    <option @if ($product->childcategory_id == $item->id) selected @endif
                                                        value="{{ $item->id }}"> {{ $item->childcategory_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand <span style="color: red">*</span></label>
                                            <select name="brand_id" class="form-control" id="">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option @if ($product->brand_id == $brand->id) selected @endif
                                                        value="{{ $brand->id }}"> {{ $brand->brand_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pickup Point <span
                                                    style="color: red">*</span></label>
                                            <select name="pickup_point_id" class="form-control" id="">
                                                <option value="">Select Pickup Point</option>
                                                @foreach ($points as $point)
                                                    <option @if ($product->pickup_point_id == $point->id) selected @endif
                                                        value="{{ $point->id }}">{{ $point->pickup_point_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column" style="display: inline-block">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Unit <span style="color: red">*</span></label>
                                            <input type="text" name="unit" value="{{ $product->unit }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tags <span style="color: red">*</span></label>
                                            <input type="text" name="tags" value="{{ $product->tags }}"
                                                id='tags' placeholder="Tags" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-4 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Purchase Price <span
                                                    style="color: red">*</span></label>
                                            <input type="number" placeholder="Purchase Price"
                                                value="{{ $product->purchase_price }}" name="purchase_price"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4  float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selling Price <span
                                                    style="color: red">*</span></label>
                                            <input type="number" placeholder="Selling Price" name="selling_price"
                                                class="form-control" value="{{ $product->selling_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Discount Price <span
                                                    style="color: red">*</span></label>
                                            <input type="number" placeholder="Discount Price" class="form-control"
                                                name="discount_price" value="{{ $product->discount_price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Warehouse <span
                                                    style="color: red">*</span></label>
                                            <select name="warehouse" class="form-control" id="">
                                                <option value="">Select Warehouse</option>
                                                @foreach ($warehouses as $warehouse)
                                                    <option @if ($product->warehouse == $warehouse->id) selected @endif
                                                        value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Stock Quantity <span
                                                    style="color: red">*</span></label>
                                            <input type="number" placeholder="Stock" class="form-control"
                                                name="stock_quantity" value="{{ $product->stock_quantity }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class="col-md-6 float-start">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Color <span
                                                    style="color: red">*</span></label>
                                            <input type="text" width="100px" id="color" placeholder="Color"
                                                name="color" class="form-control" value="{{ $product->color }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Size <span style="color: red">*</span></label>
                                            <input type="text" id="size" placeholder="Size" class="form-control"
                                                name="size" value="{{ $product->size }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="first_column">
                                    <div class=" ">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description <span
                                                    style="color: red">*</span></label>
                                            <textarea name="description" class="textarea form-control" cols="30"
                                                rows="3">
                                                {{ $product->description }}
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
                                    <input type="file" name="thumbnail" value="{{ $product->thumbnail }}"
                                        class="dropify" id="">
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">More Images (Click to add more images) <span
                                            style="color: red">*</span></label>
                                    <input type="file" name="images[]" multiple class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">Video Link: <span style="color: red">*</span></label>
                                    <input type="text" placeholder="https://example.com" name="video"
                                        value="{{ $product->video }}" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">Cash On Delivery </label>
                                    <div class="">
                                        <input type='checkbox' @if ($product->cash_on_delivery == 1) checked @endif
                                            value="1" name="cash_on_delivery" data-toggle="toggle"
                                            data-onstyle="success" data-offstyle="danger" data-on="Yes" data-off="No">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">Slider Product </label>
                                    <div class="">
                                        <input type='checkbox' @if ($product->slider_product == 1) checked @endif
                                            value="1" name="slider_product" data-toggle="toggle" data-onstyle="success"
                                            data-offstyle="danger">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dropiFy">Featured Product </label>
                                    <div class="">
                                        <input type='checkbox' @if ($product->featured == 1) checked @endif
                                            value="1" name="featured" data-toggle="toggle" data-onstyle="success"
                                            data-offstyle="danger">

                                    </div>
                                </div>
                                <hr style="border-color:#0D7EFF">
                                <div class="form-group">
                                    <label for="dropiFy">Today Deal </label>
                                    <div class="">
                                        <input type='checkbox' @if ($product->today_deal == 1) checked @endif
                                            value="1" name="today_deal" data-toggle="toggle" data-onstyle="success"
                                            data-offstyle="danger">
                                    </div>
                                </div>
                                <hr style="border-color:#0D7EFF">
                                <div class="form-group">
                                    <label for="dropiFy">Status</label>
                                    <div class="">
                                        <input type='checkbox' @if ($product->status == 1) checked @endif
                                            value="1" name="status" data-toggle="toggle" data-onstyle="success"
                                            data-offstyle="danger">
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
        <!----------bootstrap switch----------->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        {{-- ----jquery.input.tags.css----- --}}\
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"
            integrity="sha512-wTIaZJCW/mkalkyQnuSiBodnM5SRT8tXJ3LkIUA/3vBJ01vWe5Ene7Fynicupjt4xqxZKXA97VgNBHvIf5WTvg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            //______jquery.inputTags.plugin
            $('document').ready(function() {
                $('#tags,#color,#size').tagsInput({
                    'defaultText': 'Write here...',
                });
            });
        </script>
        <!-- custom.ajax request create -->
        <script>
            $(document).ready(function() {
                //_______showing subcategory________
                $('body').on("change", '#category_id', function() {
                    let id = $(this).val();
                    $.ajax({
                        url: "{{ route('show.sub') }}",
                        type: 'GET',
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            // Clear all existing options except for the desired one
                            $('#subcategory_id').children().not('#sub_val').remove();

                            // Loop through the response and append options to the select element
                            $.each(response, function(key, value) {
                                $('#subcategory_id').append('<option value="' + value.id +
                                    '">' + value.subcategory_name + '</option>');
                            });
                        }
                    });
                });

                //______child category showing______
                $('body').on("change", '#subcategory_id', function() {
                    let id = $(this).val();
                    $.ajax({
                        url: "{{ route('show.child') }}",
                        type: 'GET',
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            /// Clear all existing options except for the desired one
                            $('#childcategory_id').children().not('#child_val').remove();

                            // Loop through the response and append options to the select element
                            $.each(response, function(key, value) {
                                $('#childcategory_id').append('<option value="' + value.id +
                                    '">' + value.childcategory_name + '</option>');
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

@extends('layouts.admin')
@section('admin-content')
@push('css')
<style>
    .checkbox-wrapper-34 {
      --blue: #0D7EFF;
      --g08: #E1E5EB;
      --g04: #848ea1;
    }
  
    .checkbox-wrapper-34 .tgl {
      display: none;
    }
    .checkbox-wrapper-34 .tgl,
    .checkbox-wrapper-34 .tgl:after,
    .checkbox-wrapper-34 .tgl:before,
    .checkbox-wrapper-34 .tgl *,
    .checkbox-wrapper-34 .tgl *:after,
    .checkbox-wrapper-34 .tgl *:before,
    .checkbox-wrapper-34 .tgl + .tgl-btn {
      box-sizing: border-box;
    }
    .checkbox-wrapper-34 .tgl::selection,
    .checkbox-wrapper-34 .tgl:after::selection,
    .checkbox-wrapper-34 .tgl:before::selection,
    .checkbox-wrapper-34 .tgl *::selection,
    .checkbox-wrapper-34 .tgl *:after::selection,
    .checkbox-wrapper-34 .tgl *:before::selection,
    .checkbox-wrapper-34 .tgl + .tgl-btn::selection {
      background: none;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn {
      outline: 0;
      display: block;
      width: 57px;
      height: 27px;
      position: relative;
      cursor: pointer;
      user-select: none;
      font-size: 12px;
      font-weight: 400;
      color: #fff;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn:after,
    .checkbox-wrapper-34 .tgl + .tgl-btn:before {
      position: relative;
      display: block;
      content: "";
      width: 44%;
      height: 100%;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn:after {
      left: 0;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn:before {
      display: inline;
      position: absolute;
      top: 7px;
    }
    .checkbox-wrapper-34 .tgl:checked + .tgl-btn:after {
      left: 56.5%;
    }
  
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn {
      background: var(--g08);
      border-radius: 20rem;
      padding: 2px;
      transition: all 0.4s ease;
      box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:after {
      border-radius: 2em;
      background: #fff;
      transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), padding 0.3s ease, margin 0.3s ease;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:before {
      content: "OFF";
      top:4px;
      left: 28px;
      color: var(--g04);
      font-weight: bold;
      transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:active {
      box-shadow: inset 0 0 0 30px rgba(0, 0, 0, 0.1);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:active:after {
      padding-right: 0.4em;
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn {
      background: var(--blue);
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn:active {
      box-shadow: inset 0 0 0 30px rgba(0, 0, 0, 0.1);
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn:active:after {
      margin-left: -0.4em;
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn:before {
      content: "ON";
      font-weight: bold;
      top:4px;
      left: 7px;
      color: #fff;
    }
  </style>
@endpush
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
                                                <option value="">Select Category</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Child Category <span style="color: red">*</span></label>
                                            <select name="childcategory" class="form-control" id="">
                                                <option value="">Select Child Category</option>
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
                                            <label for="exampleInputEmail1">Brand <span style="color: red">*</span></label>
                                            <select name="category" class="form-control" id="">
                                                <option value="">Select Brand</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
                                                <option value="">Category</option>
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
                                    <div class="col-md-12 ">
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
                        <div class="card card-success">\
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
                                    <div class="checkbox-wrapper-34">
                                        <input class='tgl tgl-ios' id='toggle-34' type='checkbox'>
                                        <label class='tgl-btn' for='toggle-34'></label>
                                    </div>
                                </div>
                                <hr style="border-color:#0D7EFF">
                                <div class="form-group">
                                    <label for="dropiFy">Today Deal </label>
                                    <div class="checkbox-wrapper-34">
                                        <input  type='checkbox'>
                                        <label for="afterLabel">&nbsp; Active</label>
                                    </div>
                                </div>
                                <hr style="border-color:#0D7EFF">
                                <div class="form-group">
                                    <label for="dropiFy">Status</label>
                                    <div class="checkbox-wrapper-34">
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
@endsection

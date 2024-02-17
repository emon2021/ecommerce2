<div class="modal-body">
    <div class="hold-transition login-page m-auto" id="div_body" style="width: 25rem; height: 23rem">
      <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"></a>
            </div>
            <div class="card-body">
              <form id="update_form" action="{{route('childcategory.store')}}" method="post">
                  @csrf
                  <div>
                      <label for="Category">Select Category</label>
                      <div class="input-group">
                          <select name="category_id" class="form-control" id="">
                              <option id="" value="">Select Category</option>
                              @foreach($category as $cat)
                                  <option class="" @if($cat->id == $child->category_id) selected @endif value="{{$cat->id}}">{{$cat->category_name}}</option>
                                
                              @endforeach
                          </select>
                         
                      </div>
                  </div>
                  <div id="edit_sub">
                    <div class="edit_subcat">
                        <label for="subCategory">Select Sub Category</label>
                        <div class="input-group">
                            <select name="subcategory_id" class="form-control" id="">
                                <option value="">Select Sub Category</option>
                                @foreach($subcategory as $sub)
                                    <option class="" @if($sub->id == $child->subcategory_id) selected @endif value="{{$sub->id}}">{{$sub->subcategory_name}}</option>
                                  
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
                  <div>
                      <label for="subcategoryName">Child Category Name</label>
                <div class="input-group mb-3">
                  <input type="text" name="childcategory_name" value="{{$child->childcategory_name}}" class="form-control @error('childcategory_name') is-invalid @enderror" placeholder="Child Category Name">
                  
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-list"></span>
                    </div>
                  </div>
                  @error('childcategory_name')
                    <strong class="text text-danger">{{$message}}</strong>
                  @enderror
                </div>
                  </div>
                  <div id="errors" style="color: darkred">

                  </div>
                <div class="row">
                  <div class="col-8"></div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" id="update_btn" class="btn btn-primary btn-block">Update</button>
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
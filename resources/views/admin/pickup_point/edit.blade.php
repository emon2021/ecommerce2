<div class="modal-body">
    <div class="hold-transition login-page m-auto" id="div_body" style="width: 25rem; height: 31rem">
      <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"></a>
            </div>
            <div class="card-body">
              <form id="update_form" action="{{route('pickup.point.update',$pickup->id)}}" method="post">
                  @csrf

            <div>
                      <label for="subcategoryName">Pickup Point Name</label>
                <div class="input-group mb-3">
                  <input type="text" name="update_pickup_point_name" value="{{$pickup->pickup_point_name}}" class="form-control">
                  
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-list"></span>
                    </div>
                  </div>
                </div>
            </div>
            <div>
                      <label for="subcategoryName">Pickup Point Address</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="update_pickup_point_address" value="{{$pickup->pickup_point_address}}">
                </div>
            </div>
            <div>
                      <label for="subcategoryName">Pickup Point Phone</label>
                <div class="input-group mb-3">
                  <input type="number" name="update_pickup_point_phone" value="{{$pickup->pickup_point_phone}}" class="form-control">
                  
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-list"></span>
                    </div>
                  </div>
                </div>
                
            </div>
            <div>
                      <label for="subcategoryName">Another Phone</label>
                <div class="input-group mb-3">
                  <input type="number" name="update_another_phone" value="{{$pickup->another_phone}}" class="form-control">
                  
                </div>
                
            </div>
                  <div id="errors_up" style="color: darkred">

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
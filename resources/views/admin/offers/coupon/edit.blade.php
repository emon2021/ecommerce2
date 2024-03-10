<div class="modal-body">
    <div class="hold-transition login-page m-auto" id="div_body" style="width: 25rem; height: 34rem">
      <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"></a>
            </div>
            <div class="card-body">
              <form id="update_form" action="{{route('coupon.update',$coupon->id)}}" method="post">
                  @csrf

            <div>
                      <label for="subcategoryName">Coupon Code</label>
                <div class="input-group mb-3">
                  <input type="text" name="update_coupon_code" value="{{$coupon->coupon_code}}" class="form-control">
                  
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-list"></span>
                    </div>
                  </div>
                </div>
            </div>
            <div>
                      <label for="subcategoryName">Coupon Type</label>
                <div class="input-group mb-3">
                  <select name="update_coupon_type" class="form-control">
                    <option value="">Select Coupn type</option>
                    <option value="1" @if($coupon->coupon_type == '1') selected @endif >Fixed</option>
                    <option value="2" @if($coupon->coupon_type == '2') selected @endif >Percentage</option>
                  </select>
                </div>
            </div>
            <div>
                      <label for="subcategoryName">Coupn Amount</label>
                <div class="input-group mb-3">
                  <input type="number" name="update_coupon_amount" value="{{$coupon->coupon_amount}}" class="form-control">
                  
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-list"></span>
                    </div>
                  </div>
                </div>
                
            </div>
            <div>
                      <label for="subcategoryName">Coupn Duration</label>
                <div class="input-group mb-3">
                  <input type="date" name="update_coupon_valid_date" value="{{$coupon->coupon_valid_date}}" class="form-control">
                  
                </div>
                
            </div>
            <div>
                 
                <div class="input-group mb-3">
                    <input type="checkbox"   name="update_coupon_status" value= "1" @if($coupon->coupon_status == '1') checked @endif >
                    <span style="margin-left: 10px">Active Coupon</span>
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
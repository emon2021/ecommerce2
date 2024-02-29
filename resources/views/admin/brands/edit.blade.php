@push('css')
    {{-- ---dropify css cdn link--- --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
    integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="modal-body">
    <div class="hold-transition login-page m-auto" id="div_body" style="width: 25rem; height: 23rem">
      <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"></a>
            </div>
            <div class="card-body">
              <form id="update_form" action="{{route('brand.update')}}" method="post">
                  @csrf
                 
                  
                  <input type="hidden" name="hidden_id" value="{{$brand->id}}">
                  <div>
                      <label for="brandName">Brand Name</label>
                <div class="input-group mb-3">
                  <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Child Category Name">
                  
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-list"></span>
                    </div>
                  </div>
                  @error('brand_name')
                    <strong class="text text-danger">{{$message}}</strong>
                  @enderror
                </div>
                  </div>

                  <div>
                    <label for="brandLogo">Brand Logo</label>
                    <div class="input-group mb-3">
                        <input type="file" id="brand_logo" name="brand_logo" value="{{$brand->brand_logo}}"
                            class="dropify @error('brand_logo') is-invalid @enderror"
                            data-height="100">


                        @error('brand_logo')
                            <strong class="text text-danger">{{ $message }}</strong>
                        @enderror
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

@push('script')
  <!-----dropify js cdn link---->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
  integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-----dropify script---->
  <script>
    $('.dropify').dropify({
        messages: {
            'default': 'Click Here',
            'replace': 'Drag and Drop',
            'remove': 'Remove',
            'error': 'Ooops! something went wrong.',
        }
    });
</script>
@endpush
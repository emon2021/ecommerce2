@extends('layouts.app')
@section('content')
     <!-- Begin Li's Breadcrumb Area -->
     <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        
                        <!--Accordion Start-->
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!--Accordion End-->
                    </div>
                </div>
            </div>
        <form action="{{ route('order.store') }}" id="checkout_form" method="post">
        @csrf
        @method('POST')
            <div class="row">
                <div class="col-lg-6 col-12">
                                   
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select name="country_name" class="nice-select wide @error('country_name') is-invalid @enderror">
                                          <option value="bd" data-display="Bangladesh" selected>Bangladesh</option>
                                          <option value="uk">United Kingdom</option>
                                          <option value="rou">Romania</option>
                                          <option value="fr">French</option>
                                          <option value="de">Germany</option>
                                          <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                    @error('country_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Name <span class="required">*</span></label>
                                        <input placeholder="" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()?->user()->name}}" type="text">
                                        
                                    </div>
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name (optional)</label>
                                        <input placeholder="" class="@error('company_name')') is-invalid @enderror" name="company_name" type="text">
                                    </div>
                                    @error('company_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" class="@error('address') is-invalid @enderror" name="address" type="text">
                                    </div>
                                    @error('address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input name="city" class="@error('city') is-invalid @enderror" type="text">
                                    </div>
                                    @error('city')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State  <span class="required">*</span></label>
                                        <input name="state" class="@error('state') is-invalid @enderror" placeholder="" type="text">
                                    </div>
                                    @error('state')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input name="postcode" class="@error('postcode') is-invalid @enderror" placeholder="" type="number">
                                    </div>
                                    @error('postcode')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" class="@error('email') is-invalid @enderror" name="email" value="{{auth()?->user()->email}}" type="email">
                                    </div>
                                    
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone  <span class="required">*</span></label>
                                        <input name="phone" class="@error('phone') is-invalid @enderror" type="number" value="{{auth()?->user()->phone}}">
                                    </div>
                                    
                                    @error('phone')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <h3>
                                        <label>Ship to a different address?</label>
                                        <input name="ship_to_different" id="ship-box" type="checkbox">
                                    </h3>
                                </div>
                                <div id="ship-box-info" class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label>Country <span class="required">*</span></label>
                                            <select class="nice-select wide @error('ship_country') is-invalid @enderror" name="ship_country">
                                              <option value="bd" data-display="Bangladesh">Bangladesh</option>
                                              <option value="uk">London</option>
                                              <option value="rou">Romania</option>
                                              <option value="fr">French</option>
                                              <option value="de">Germany</option>
                                              <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                        @error('ship_country')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Name <span class="required">*</span></label>
                                            <input name="ship_name" class="@error('ship_name') is-invalid @enderror" placeholder="" type="text">
                                        </div>
                                        @error('ship_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                         @enderror
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Company Name</label>
                                            <input name="ship_company_name" class="@error('ship_company_name') is-invalid @enderror" placeholder="" type="text">
                                        </div>
                                        @error('ship_company_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input name="ship_address" class="@error('ship_address') is-invalid @enderror" placeholder="Street address" type="text">
                                        </div>
                                        @error('ship_address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input name="ship_city" class="@error('ship_city') is-invalid @enderror" type="text">
                                        </div>
                                        @error('ship_city')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>State / County <span class="required">*</span></label>
                                            <input name="ship_state" class="@error('ship_state') is-invalid @enderror" placeholder="" type="text">
                                        </div>
                                        @error('ship_state')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input name="ship_postcode" class="@error('ship_postcode') is-invalid @enderror" placeholder="" type="number">
                                        </div>
                                        @error('ship_postcode')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input name="ship_email" class="@error('ship_email') is-invalid @enderror" placeholder="" type="email">
                                        </div>
                                        @error('ship_email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Phone  <span class="required">*</span></label>
                                            <input name="ship_phone" class="@error('ship_phone') is-invalid @enderror" type="number">
                                        </div>
                                        @error('ship_phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea name="notes" class="@error('notes') is-invalid @enderror" id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        @error('notes')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $cart_content)
                                    <tr class="cart_item">
                                      <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity"> × 1</strong></td>
                                      <td class="cart-product-total"><span class="amount">{{$setting?->currency}} {{$cart_content->price}}</span></td>  
                                      <input type="hidden" name="product_id" value="{{$cart_content->id}}">
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">{{$setting?->currency}}  {{Cart::subtotal()}}</span></td>

                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">{{$setting?->currency}}   {{Cart::total()}}</span></strong></td>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="radio" style="width: 22px; float:left" class="form-control" name="stripe_card" value="1" id="">
                                            <label style="margin-top: 11px;margin-left: 10px" for="cashOnDelivery">Cash On Delivery</label>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <input  type="radio" style="width: 22px; float:left" class="form-control" name="stripe_card" value="Stripe" id="">
                                            <label style="margin-top: 11px;margin-left: 10px" for="CardTransfer">Card Transfer</label>
                                        </div>
                                    </div>
                                  
                                  <div class="card">
                                    <div class="card-header" id="#payment-2">
                                      <h5 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Cheque Payment
                                        </a>
                                      </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                      <div class="card-body">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card">
                                    <div class="card-header" id="#payment-3">
                                      <h5 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          PayPal
                                        </a>
                                      </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                      <div class="card-body">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-button-payment">
                                    <input value="Place order" id="place_order" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!--Checkout Area End-->
@endsection

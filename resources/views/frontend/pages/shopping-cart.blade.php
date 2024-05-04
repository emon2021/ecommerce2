@extends('layouts.app')
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-price">Color</th>
                                        <th class="li-product-price">Size</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $content)
                                    <tr>
                                        <td class="li-product-remove"><a href="{{route('cart.product.remove',$content->rowId)}}" id="cart_item"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail" style="width: 100px"><a href="#" style="width: 100px"><img width="100%" src="{{asset($content->options->thumbnail)}}" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#">{{$content->name}}</a></td>
                                        <td class="li-product-price"><span class="amount">{{$setting->currency}}{{$content->price}}</span></td>
                                        <td class="li-product-price"><select name="color" id="">
                                            @php
                                                $product = App\Models\Product::findOrfail($content->id);
                                                $colors = $product->color;
                                                $sizes = $product->size;
                                            @endphp
                                            @foreach(explode(',',$colors) as $color)
                                                <option value="{{$color}}" @if($color == $content->options->color) selected @endif >{{$color}}</option>
                                            @endforeach
                                        </select></td>
                                        <td class="li-product-price"><select name="color" id="">
                                           
                                            @foreach(explode(',',$sizes) as $size)
                                                <option value="{{$size}}" @if($size == $content->options->size) selected @endif >{{$size}}</option>
                                            @endforeach
                                        </select></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{$content->qty}}" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">{{$setting->currency}}{{$content->price * $content->qty}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>{{$setting->currency}}{{Cart::subtotal()}}</span></li>
                                        <li>Total <span>{{$setting->currency}}{{Cart::total()}}</span></li>
                                    </ul>
                                    <a href="#">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
    <form action="" id="remove" method="post">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','#cart_item',function(e){
            e.preventDefault();
            const get_attr = $(this).attr('href');
            
            const set_route = $('#remove').attr('action',get_attr);

            $('#remove').submit();
        })
        //  handle form submission
        $('#remove').on('submit',function(event){
            event.preventDefault();
            const get_route = $(this).attr('action');
            const formData = new FormData($(this)[0]);
            $.ajax({
                url:get_route,
                type:'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == 'success'){
                        toastr.success(response.message);
                        $('#cart_item').parent().parent().remove();
                    }
                    if(response.cart_count){
                        $('#cart_counter').html(response.cart_count);
                    }
                    if(response.cart_total){
                        $('#cart_total').html(response.cart_total);
                    }
                    if(response.cart_subtotal){
                        $('#cart_subtotal').html(response.cart_subtotal);
                    }
                }
            });
        });
    });
</script>
@endpush
@extends('layouts.app')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
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
                                    <th class="li-product-stock-status">Stock Status</th>
                                    <th class="li-product-add-cart">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlists as $key => $product)
                                    <tr class="wishlist_row" >
                                        <td class="li-product-remove"><a href="{{route('wishlist.destroy',$product->wishlist_id)}}" class="wishlist_destroy"><i class="fa fa-times"></i></a></td>
                                       
                                        <td class="li-product-thumbnail"><a href="#"><img width="100px" src="{{asset($product->thumbnail)}}" alt=""></a></td>
                                        <td class="li-product-name"><a href="#">{{$product->name}}</a></td>
                                        <td class="li-product-price"><span class="amount">{{$setting->currency}} 
                                                @if($product->discount_price) 
                                                    {{$product->discount_price}}
                                                @else
                                                    {{$product->selling_price}}
                                                @endif
                                         </span>
                                        </td>
                                        <td class="li-product-stock-status">
                                            <span class="in-stock">
                                                @if($product->stock_quantity != null && $product->stock_quantity>0)
                                                    In Stock
                                                @else
                                                   <span class="text-danger">Stock Out</span> 
                                                @endif
                                            </span>
                                        </td>
                                        <td class="li-product-add-cart"><a href="#">add to cart</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form action="" id="wishlist_form" method="post">
    @csrf @method('DELETE')
</form>
<!--Wishlist Area End-->
@push('scripts')
<script>
    $(document).ready(function(){
        $('body').on('click','.wishlist_destroy',function(e){
            e.preventDefault();
            let url = $(this).attr('href');
            let set_route = $('#wishlist_form').attr('action',url);
            // SweetAlert confirmation
            Swal.fire({
                        title: "Are you sure you want to delete?",
                        text: "",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#23D160",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If confirmed, submit the form
                            $('#wishlist_form').submit();
                            $(this).parent().parent().remove();
                        } else {
                            // Otherwise, show a message
                            Swal.fire({
                                title: "Your Data is Safe!",
                                text: "",
                                icon: "info"
                            });
                        }
                     });
                //  
            $('#wishlist_form').submit(function(event){
                event.preventDefault();
                
                let get_route = $(this).attr('action');
                let get_data = new FormData($(this)[0]);
                // alert(get_route);
                $.ajax({
                    url: get_route,
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    data: get_data,
                    success: function(response){
                        
                            if(response >= 0 ){
                                $('#wishlist_counter').text(response);
                            }
                            if(response == 'showLoginForm'){
                                window.location.href ="{{ route('login.showForm') }}";
                            }
                            
                    },
                    error: function(xhr,status,error){
                      
                    }
                });
            });
            
        });
    });
</script>
@endpush

@endsection
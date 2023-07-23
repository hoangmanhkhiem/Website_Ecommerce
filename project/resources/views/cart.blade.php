@extends('includes.master')

@section('content')

    <section class="container" style="margin-top: 20px;">

        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/cart')}}">My Cart</a>
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="information-blocks">
                <div class="table-responsive">
                    <table class="cart-table">
                        <tr>
                            <th class="column-1">Product Name</th>
                            <th class="column-2">Unit Price</th>
                            <th class="column-3">Qty</th>
                            <th class="column-4">Subtotal</th>
                            <th class="column-5"></th>
                        </tr>
                        <tr id="cartempty"></tr>
                        @forelse($carts as $cart)
                        <tr id="item{{$cart->product}}">
                            <td>
                                <div class="traditional-cart-entry">
                                    <a href="#" class="image"><img src="{{url('/assets/images/products')}}/{{\App\Product::findOrFail($cart->product)->feature_image}}" alt=""></a>
                                    <div class="content">
                                        <div class="cell-view">
                                            {{--<a href="#" class="tag">woman clothing</a>--}}
                                            <a href="{{url('/product')}}/{{$cart->product}}/{{str_replace(' ','-',strtolower(\App\Product::findOrFail($cart->product)->title))}}" class="title">{{$cart->title}}</a>
                                            {{--<div class="inline-description">S / Dirty Pink</div>--}}
                                            {{--<div class="inline-description">Zigzag Clothing</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td id="price{{$cart->product}}" class="prices">${{\App\Product::findOrFail($cart->product)->price}}</td>
                            <td>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="entry number-minus" id="minus{{$cart->product}}">&nbsp;</div>
                                    <div class="entry number" id="number{{$cart->product}}">{{$cart->quantity}}</div>
                                    <div class="entry number-plus" id="plus{{$cart->product}}">&nbsp;</div>
                                </div>
                            </td>
                            <td><div class="subtotal" id="subtotal{{$cart->product}}">${{$cart->cost}}</div></td>
                            <td><a class="remove-button" onclick="getDelete({{$cart->product}})"><i class="fa fa-times"></i></a></td>

                            <form id="citem{{$cart->product}}">
                                {{csrf_field()}}
                                @if(Session::has('uniqueid'))
                                    <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
                                @else
                                    <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
                                @endif
                                <input type="hidden" name="title" value="{{$cart->title}}">
                                <input type="hidden" name="product" value="{{$cart->product}}">
                                <input type="hidden" id="cost{{$cart->product}}" name="cost" value="{{$cart->cost}}">
                                <input type="hidden" id="quantity{{$cart->product}}" name="quantity" value="{{$cart->quantity}}">
                            </form>

                        </tr>

                        @empty
                            <tr>
                                <td>
                                    <h3>Your Cart is Empty.</h3>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse

                    </table>
                </div>
                <div class="cart-submit-buttons-box">
                    <div class="row" style="margin: 0">
                    <div class="cart-summary-box pull-right col-md-6" style="margin: 0">
                        <div class="grand-total">Total <span id="grandtotal">${{round($sum,2)}}</span></div>
                        <a class="col-md-6 pull-right button style-10" href="{{route('user.checkout')}}">Proceed To Checkout</a>
                        <a class="col-md-5 pull-right button style-10" href="{{url('/')}}">Continue Shopping</a>

                    </div>
                    </div>
                </div>

            </div>


        </div>

    </section>

@stop

@section('footer')
<script>

</script>
@stop
@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">

                <div class="col-md-12 text-center services">
                    <div class="col-md-offset-2 col-md-8 order-div">

                        <div class="col-md-8 order-left">
                            <h4>ENTER YOUR DETAILS</h4>
                            <form action="{{route('payment.submit')}}" method="post" target="_blank">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="zip" placeholder="Postal Code" required>
                                </div>

                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="UK" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="customer" value="1" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <button type="submit" class="genius-btn"><i class="fa fa-paypal fa-fw"></i> Checkout</button>
                            </form>

                        </div>
                        <div class="col-md-4 order-right">
                            <h4>ORDER DETAILS</h4>

                            {{--<h3>{{$pricing->title}}</h3>--}}
                            {{--<h3 class="pricing-count" style="margin: 0">${{$pricing->cost}}/Mo</h3>--}}
                            {{--<div class="pricing-list">--}}
                                {{--<ul>--}}
                                    {{--@foreach($pricing->options as $option)--}}
                                        {{--@if($option != "")--}}
                                            {{--<li><i class="fa fa-check"></i> {{$option}}</li>--}}
                                        {{--@else--}}
                                            {{--<li>&nbsp;</li>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')

@stop
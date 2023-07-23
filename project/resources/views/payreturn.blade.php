@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-12 text-center services">
                    <div class="services-div">
                        <h1 class="text-center" style="color: green"> Congratulation !!</h1>
                        <h2>Your Order Has been Confirmed.</h2>
                        <p></p>
                        <a href="{{url('user/account')}}" class="button style-10">My Account</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop

@section('footer')

@stop
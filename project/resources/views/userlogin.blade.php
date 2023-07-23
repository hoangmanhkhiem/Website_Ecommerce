@extends('includes.master')

@section('content')

<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <div class="container">
                <!-- Form Name -->
                <h2 class="text-center marginbottom">Login</h2>

                <form role="form" method="POST" action="{{ route('user.login.submit') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <input name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" type="email" required>
                                <p id="emailError" class="errorMsg"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <input name="password" placeholder="Password" class="form-control"  type="password" required>
                                <p id="passError" class="errorMsg"></p>
                            </div>
                        </div>
                    </div>

                    <div id="resp" class="col-md-6 col-md-offset-3">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                    <!-- Button -->
                    <div class="row text-center">
                        <div class="col-md-6 col-md-offset-3 login">
                        <div class="col-md-4 marginbottom">
                            <a href="{{route('user.reg')}}" class="text-center">Create a New Account.</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="button style-10" id="LoginButton"><strong>Login</strong></button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('user.forgotpass')}}">Forgot Password?</a>
                        </div>

                        </div>
                    </div>

                    <div class="form-group text-center">

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('footer')

@stop
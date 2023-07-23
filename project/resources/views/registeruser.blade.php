@extends('includes.master')

@section('content')

    <div id="wrapper" class="go-section">
        <div class="row">
            <div class="container">
                <div class="container">
                    <!-- Form Name -->
                    <h2 class="text-center marginbottom">Registration</h2>

                    <form action="{{route('user.reg.submit')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input name="name" placeholder="Full Name" class="form-control" type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input name="phone" placeholder="Phone Number" class="form-control"  type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input name="email" placeholder="Email" class="form-control"  type="email" required>
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
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input name="password_confirmation" placeholder="Confirm Password" class="form-control"  type="password" required>
                                    <p id="passError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                        <div id="resp" class="col-md-6 col-md-offset-3">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>* {{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>* {{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>* {{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-5 control-label"></label>
                            <div class="col-md-2">
                                <button type="submit" id="RegButton" class="button style-10" ><strong>Register</strong></button>
                            </div>
                        </div>
                        <div class="form-group text-center login">
                            <div class="col-xs-12 col-md-6 col-md-offset-3" style="margin-top: 10px;">
                                <a href="{{route('user.login')}}" class="text-center">Already Have Account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop

@section('footer')

@stop
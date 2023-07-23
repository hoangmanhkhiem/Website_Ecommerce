<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="Simple Documentation for project NewsOcean.">
    <meta name="author" content="GeniusOcean">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$settings[0]->title}} - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/genius-admin.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="">
                    <h1>Vendor Registration</h1>
                    <hr>
                    <div class="text-center" id="res" style="display: none;"></div>

                    <form action="{{route('vendor.reg.submit')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input name="name" placeholder="Vendor Owner Name" class="form-control" type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input name="shop_name" placeholder="Vendor Shop Name" class="form-control" type="text" required>
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
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-5 control-label"></label>
                            <div class="col-md-2">
                                <input type="submit" id="admin_btn" class="btn btn-custom btn-lg btn-block" value="Register">
                            </div>
                        </div>
                        <div class="form-group text-center login">
                            <div class="col-xs-12 col-md-6 col-md-offset-3" style="margin-top: 10px;">
                                <a href="{{route('vendor.login')}}" class="text-center">Already Have Account? Login</a>
                            </div>
                        </div>
                    </form>
                    <!-- <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a> -->
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer" style="margin-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>2017 Powered by <strong><a href="{{url('/')}}" target="_blank">{{$settings[0]->title}}</a></strong></p>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
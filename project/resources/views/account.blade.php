@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="container">

            <div class="col-sm-3">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Dashboard</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab">Update Profile</a></li>
                        <li class=""><a href="#tab3" data-toggle="tab">Change Password</a></li>
                        <li class="">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- tab content -->
            <div class="col-sm-9">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('message') }}
                    </div>
                @endif
            <div class="tab-content">
                <div class="tab-pane active text-style" id="tab1">
                    <h4 class="pull-right">You Are Logged in As: {{Auth::user()->name}}</h4>
                    <h2>Recent Orders</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr class="info">
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @foreach(array_combine($order->products, $order->quantities) as $product => $quantity)
                                <tr>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{\App\Product::findOrFail($product)->title}}</td>
                                    <td>{{$quantity}}</td>
                                    <td>{{$order->booking_date}}</td>
                                    <td>{{ucfirst($order->status)}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane text-style" id="tab2">

                    <h2>Update Profile Informations</h2>
                    <hr>
                    <form method="POST" action="{{ action('UserProfileController@update',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="name" value="{{$user->name}}" placeholder="Full Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="phone" value="{{$user->email}}" placeholder="Email" class="form-control"  type="email" disabled required>

                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="phone" value="{{$user->phone}}" placeholder="Phone Number" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="fax" placeholder="Fax" value="{{$user->fax}}" class="form-control"  type="text" required>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="address" placeholder="Address" class="form-control" required>{{$user->address}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="city" placeholder="City" value="{{$user->city}}" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="zip" placeholder="Postal Code" class="form-control" value="{{$user->zip}}" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div id="resp" class="col-md-6">
                            @if ($errors->has('error'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-4 col-md-offset-1">
                                <button type="submit" class="button style-10" id="LoginButton"><strong>Update Profile</strong></button>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane text-style" id="tab3">
                    <h2>Change Password</h2>
                    <hr>
                    <form method="POST" action="{{ action('UserProfileController@passchange',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="cpass" placeholder="Current Password" class="form-control" type="password" required>

                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="newpass" placeholder="New Password" class="form-control"  type="password" required>

                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="renewpass" placeholder="Confirm New Password" class="form-control"  type="password" required>

                                </div>
                            </div>
                        </div>

                        <div id="resp" class="col-md-6">
                            @if ($errors->has('error'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-5 col-md-offset-1">
                                    <button type="submit" class="button style-10" id="LoginButton"><strong>Update Password</strong></button>
                                </div>
                            </div>
                            @if(Auth::guest())
                                <p>Logged</p>
                            @else
                                <p>Guest</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>


            </div>
        </div>
    </section>

@stop

@section('footer')

@stop
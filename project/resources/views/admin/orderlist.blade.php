@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <!-- Page Heading -->
                <div class="go-title">
                    <div class="pull-right">
                        <span><span style="background-color: lightgreen;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Completed</span>
                        <span><span style="background-color: #d9edf7;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Processing</span>
                    </div>
                    <h3>Orders</h3>
                    <div class="go-line"></div>
                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="response">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        </div>
                        <table class="table table-striped table-bordered" cellspacing="0" id="example" width="100%">
                            <thead>
                            <tr>
                                <th>Customer Email</th>
                                <th width="15%">Customer Name</th>
                                <th width="5%">Total Product</th>
                                <th width="10%">Total Cost</th>
                                <th>Payment Method</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                @if($order->status == "completed")
                                    <tr style="background-color: lightgreen;">
                                @elseif($order->status == "processing")
                                    <tr class="info">
                                @else
                                    <tr class="">
                                @endif
                                    <td>{{$order->customer_email}}</td>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{array_sum($order->quantities)}}</td>
                                    <td>${!! $order->pay_amount !!}</td>
                                    <td>{{$order->method}}</td>

                                    <td>

                                        <a href="orders/{{$order->id}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View Details </a>

                                        <a href="orders/email/{{$order->id}}" class="btn btn-primary btn-xs"><i class="fa fa-send"></i> Send Email</a>

                                        ​<span class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle btn-xs" type="button" data-toggle="dropdown">{{ucfirst($order->status)}}
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="orders/status/{{$order->id}}/processing">Processing</a></li>
                                                <li><a href="orders/status/{{$order->id}}/completed">Completed</a></li>
                                            </ul>
                                        </span>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->


@stop

@section('footer')

@stop
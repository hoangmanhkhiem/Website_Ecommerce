@extends('vendor.includes.master-vendor')

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
                                <th width="25%">Product</th>
                                <th width="15%">Quantity</th>
                                <th width="10%">Cost</th>
                                <th width="15%">Size</th>
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
                                    <td><a target="_blank" href="{{url('/product')}}/{{$order->productid}}/{{str_replace(' ','-',strtolower(\App\Product::findOrFail($order->productid)->title))}}">{{\App\Product::findOrFail($order->productid)->title}}</a></td>
                                    <td>{{$order->quantity}}</td>
                                    <td>${{$order->cost}}</td>
                                    <td>{{$order->size }}</td>
                                    <td>
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
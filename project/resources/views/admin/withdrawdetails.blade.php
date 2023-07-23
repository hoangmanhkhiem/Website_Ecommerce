@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <!-- Page Heading -->
                <div class="go-title">
                    <div class="pull-right">
                        <a href="{!! url('admin/withdraws') !!}" class="btn btn-default btn-add"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <h3>Withdraw Details</h3>
                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">

                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors ID#</strong></td>
                                <td>{{$withdraw->id}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendor Company</strong></td>
                                <td><a href="{{url('admin/vendors')}}/{{$withdraw->vendorid->id}}" target="_blank">{{$withdraw->vendorid->shop_name}}</a></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Amount:</strong></td>
                                <td><strong style="color:green">${{$withdraw->amount}}</strong></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Process Date:</strong></td>
                                <td>{{$withdraw->created_at}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Status:</strong></td>
                                <td><strong>{{ucfirst($withdraw->status)}}</strong></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors Name:</strong></td>
                                <td>{{$withdraw->vendorid->name}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors Email:</strong></td>
                                <td>{{$withdraw->vendorid->email}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors Phone:</strong></td>
                                <td>{{$withdraw->vendorid->phone}}</td>
                            </tr>

                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Method:</strong></td>
                                <td>{{$withdraw->method}}</td>
                            </tr>
                            @if($withdraw->method != "Bank")
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>{{$withdraw->method}} Email:</strong></td>
                                <td>{{$withdraw->acc_email}}</td>
                            </tr>
                            @else
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>{{$withdraw->method}} Account:</strong></td>
                                    <td>{{$withdraw->iban}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Account Name:</strong></td>
                                    <td>{{$withdraw->acc_name}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Country:</strong></td>
                                    <td>{{ucfirst(strtolower($withdraw->country))}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Address:</strong></td>
                                    <td>{{$withdraw->address}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>{{$withdraw->method}} Swift Code:</strong></td>
                                    <td>{{$withdraw->swift}}</td>
                                </tr>
                            @endif
                            <tr>
                                @if($withdraw->status == "pending")
                                <td width="30%" style="text-align: right;"><a href="accept/{{$withdraw->id}}" class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i> Accept</a></td>

                                <td><a href="reject/{{$withdraw->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i> Reject</a></td>
                                @endif
                            </tr>
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
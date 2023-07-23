@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <!-- Page Heading -->
                <div class="go-title">
                    <div class="pull-right">
                        <a href="{!! url('admin/products') !!}" class="btn btn-primary btn-add"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                    </div>
                    <h3>Pending Products</h3>
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
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th width="10%">ID#</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    {{\App\Category::where('id',$product->category[0])->first()->name}}<br>
                                    @if($product->category[1] != "")
                                    {{\App\Category::where('id',$product->category[1])->first()->name}}<br>
                                    @endif
                                    @if($product->category[2] != "")
                                        {{\App\Category::where('id',$product->category[2])->first()->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($product->status == 1)
                                        Active
                                    @elseif($product->status == 2)
                                        Pending
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>

                                        <a href="{!! url('admin/products') !!}/{{$product->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View </a>

                                        <a href="{!! url('admin/products') !!}/status/{{$product->id}}/0" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Accept </a>

                                        <a href="{!! url('admin/products') !!}/status/{{$product->id}}/1" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Reject </a>

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
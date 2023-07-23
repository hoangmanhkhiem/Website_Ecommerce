@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">
                <!-- Page Heading -->
                <div class="go-title">
                    <div class="pull-right">
                        <a href="{!! url('admin/ads/create') !!}" class="btn btn-primary btn-add"><i class="fa fa-plus"></i> Add New Advertisement</a>
                    </div>
                    <h3>Advertisements</h3>
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
                                <th>Ad Type</th>
                                <th>Banner Image</th>
                                <th>Redirect URL</th>
                                <th>Banner Size</th>
                                <th>Clicks</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($ads as $ad)
                            <tr>
                                <td>{{ucfirst($ad->type)}}</td>
                                <td>
                                    @if($ad->banner_file != null)
                                        <img src="../assets/images/ads/{{$ad->banner_file}}" class="manage-ads" alt="ad1.jpg">
                                    @else
                                        No Need
                                    @endif
                                </td>
                                <td>{{$ad->redirect_url}}</td>
                                <td>{{$ad->banner_size}}</td>
                                <td>{{$ad->clicks}}</td>
                                <td>{{$ad->status}}</td>
                                <td>

                                    <form method="POST" action="{!! action('AdvertiseController@destroy',['id' => $ad->id]) !!}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{!! url('admin/ads') !!}/{{$ad->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit </a>
                                        @if($ad->status==1)
                                            <a href="{!! url('admin/ads') !!}/status/{{$ad->id}}/0" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> Deactive </a>
                                        @else
                                            <a href="{!! url('admin/ads') !!}/status/{{$ad->id}}/1" class="btn btn-primary btn-xs"><i class="fa fa-times"></i> Active </a>
                                        @endif
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove </button>
                                    </form>
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
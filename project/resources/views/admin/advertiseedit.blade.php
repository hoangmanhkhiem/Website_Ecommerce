@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">

                <!-- Page Heading -->
                <div class="go-title">
                    <div class="pull-right">
                        <a href="{!! url('admin/ads') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <h3>Edit Advertisement</h3>
                    <div class="go-line"></div>
                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="gocover"></div>
                        <div id="response"></div>
                        <form method="POST" action="{!! action('AdvertiseController@update',['id'=>$ad->id]) !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Advertise Type <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select onchange="adstypes(this.value)" name="type" class="form-control" required>
                                        <option value="">Select Advertise Type</option>
                                        @if($ad->type == "banner")
                                            <option value="banner" selected>Banner</option>
                                        @else
                                            <option value="banner">Banner</option>
                                        @endif
                                        @if($ad->type == "script")
                                            <option value="script" selected>Script</option>
                                        @else
                                            <option value="script">Script</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Advertise Banner Size <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="banner_size" class="form-control" required>
                                        <option value="">Select Banner Size</option>
                                        @if($ad->banner_size == "728x90")
                                            <option value="728x90" selected>728x90</option>
                                        @else
                                            <option value="728x90">728x90</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div id="typeoption">
                                @if($ad->type == "script")
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Ad Script <span class="required">*</span>
                                            <p class="small-label">Google Adsense or Others</p>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="script" placeholder="Paste Your Ad Script Here.." required="required">{{$ad->script}}</textarea>
                                        </div>
                                    </div>
                                @else
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Advertiser Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" value="{{$ad->advertiser_name}}" name="advertiser_name" placeholder="e.g Sports" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Current Banner <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img src="{!! url('/') !!}/assets/images/ads/{{$ad->banner_file}}" style="max-height: 200px;" alt="No Banner Photo">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Change Advertise Banner <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" accept="image/*" name="banner" id="uploadFile"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Redirect URL <span class="required">*</span>
                                            <p class="small-label">e.g. http://geniusocean.com</p>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" value="{{$ad->redirect_url}}" name="redirect_url" placeholder="e.g. http://geniusocean.com" required="required" type="text">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-success btn-block">Update Advertisement</button>
                                </div>
                            </div>
                        </form>
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
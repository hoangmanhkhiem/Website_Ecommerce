@extends('includes.master')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="background-color:rgba(0,0,0,0.7);">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>FAQ</h1>
                </div>
            </div>

        </div>


    </section>


    <div id="wrapper" class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    {!! $pagedata->faq !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop
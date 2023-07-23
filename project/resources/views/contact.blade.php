@extends('includes.master')

@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="background-color:rgba(0,0,0,0.7);">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>Contact Us</h1>
                </div>
            </div>

        </div>
    </section>

    <div id="wrapper" class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="container">
                        <!-- Form Name -->
                        <h3>Contact Us Today!</h3>
                        <hr>

                        <form action="{{action('FrontEndController@contactmail')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="to" value="{{$pagedata->contact_email}}">
                            <!-- Success message -->
                            @if(Session::has('cmail'))
                            <div class="alert alert-success" role="alert" id="success_message">
                                {{ Session::get('cmail') }}
                            </div>
                            @endif
                            <!-- Text input-->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input name="name" placeholder="Name" class="form-control" type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>

                                <div class="form-group col-md-6">
                                    <input name="email" placeholder="Email" class="form-control"  type="email" required>
                                    <p id="emailError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input name="phone" placeholder="Phone" class="form-control"  type="text" required>
                                    <p id="phoneError" class="errorMsg"></p>
                                </div>

                                <div class="form-group col-md-6">
                                    <select name="department" class="form-control selectpicker" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <p id="departmentError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" placeholder="Message" name="message" rows="8" required></textarea>
                                    <p id="messageError" class="errorMsg"></p>
                                </div>
                            </div>

                            <div id="resp"></div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-5 control-label"></label>
                                <div class="col-md-2">
                                    <button type="submit" class="button style-10" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@stop

@section('footer')

@stop
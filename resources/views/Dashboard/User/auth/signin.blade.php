@extends('Dashboard.layouts.master2')
@section('css')

    <style>
        .panel {display: none;}
    </style>


    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">اللوحة الإكترونية لتسجيل الدخول</h1></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{trans('Dashboard/login_trans.Welcome')}}</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">{{trans('Dashboard/login_trans.Select_Enter')}}</label>
                                                <select class="form-control" id="sectionChooser">
                                                    <option value="" selected disabled>{{trans('Dashboard/login_trans.Choose_list')}}</option>
                                                    <option value="user">{{trans('Dashboard/login_trans.user')}}</option>
                                                    <option value="admin">{{trans('Dashboard/login_trans.admin')}}</option>
                                                    <option value="doctor">{{trans('Dashboard/login_trans.Doctor')}}</option>
                                                    <option value="ray_employee">{{trans('Dashboard/login_trans.xray')}}</option>
                                                    <option value="laboratorie_employee">{{trans('Dashboard/login_trans.lab')}}</option>
                                                </select>
                                            </div>


                                            {{--form user--}}
                                            <div class="panel" id="user">
                                                <h2> {{trans('Dashboard/login_trans.user')}} </h2>
                                                <form method="POST" action="{{ route('login.patient') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.email')}}</label> <input  class="form-control" placeholder="admin@example.com" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.password')}}</label> <input class="form-control" placeholder="******"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">تسجيل الدخول</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{trans('Dashboard/login_trans.forgot_password')}}</a></p>
                                                    <p> {{trans('Dashboard/login_trans.have_account')}}<a href="{{ url('/' . $page='signup') }}"> {{trans('Dashboard/login_trans.create_account')}}</a></p>
                                                </div>
                                            </div>

                                            {{--form admin--}}
                                            <div class="panel" id="admin">
                                                <h2> {{trans('Dashboard/login_trans.admin')}}</h2>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                @csrf
                                                <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.email')}}</label> <input  class="form-control" placeholder="admin@example.com" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.password')}}</label> <input class="form-control" placeholder="******"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">تسجيل الدخول</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{trans('Dashboard/login_trans.forgot_password')}}</a></p>
                                                    <p> {{trans('Dashboard/login_trans.have_account')}}<a href="{{ url('/' . $page='signup') }}"> {{trans('Dashboard/login_trans.create_account')}}</a></p>
                                                </div>
                                            </div>

                                            {{--form Doctor--}}
                                            <div class="panel" id="doctor">
                                                <h2> {{trans('Dashboard/login_trans.Doctor')}}</h2>
                                                <form method="POST" action="{{ route('login.doctor') }}">
                                                @csrf
                                                <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.email')}}</label> <input  class="form-control" placeholder="admin@example.com" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.password')}}</label> <input class="form-control" placeholder="******"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">تسجيل الدخول</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{trans('Dashboard/login_trans.forgot_password')}}</a></p>
                                                    <p> {{trans('Dashboard/login_trans.have_account')}}<a href="{{ url('/' . $page='signup') }}"> {{trans('Dashboard/login_trans.create_account')}}</a></p>
                                                </div>
                                            </div>

                                            {{--form RayEmployee--}}
                                            <div class="panel" id="ray_employee">
                                                <h2> {{trans('Dashboard/login_trans.xray')}}</h2>
                                                <form method="POST" action="{{ route('login.ray_employee') }}">
                                                @csrf
                                                <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.email')}}</label> <input  class="form-control" placeholder="admin@example.com" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.password')}}</label> <input class="form-control" placeholder="******"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">تسجيل الدخول</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{trans('Dashboard/login_trans.forgot_password')}}</a></p>
                                                    <p> {{trans('Dashboard/login_trans.have_account')}}<a href="{{ url('/' . $page='signup') }}"> {{trans('Dashboard/login_trans.create_account')}}</a></p>
                                                </div>
                                            </div>

                                            {{--form laboratorie_employee--}}
                                            <div class="panel" id="laboratorie_employee">
                                                <h2>{{trans('Dashboard/login_trans.lab')}}</h2>
                                                <form method="POST" action="{{ route('login.laboratorie_employee') }}">
                                                @csrf
                                                <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.email')}}</label> <input  class="form-control" placeholder="admin@example.com" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('Dashboard/login_trans.password')}}</label> <input class="form-control" placeholder="******"   type="password"name="password" required autocomplete="current-password" >
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">تسجيل الدخول</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{trans('Dashboard/login_trans.forgot_password')}}</a></p>
                                                    <p> {{trans('Dashboard/login_trans.have_account')}}<a href="{{ url('/' . $page='signup') }}"> {{trans('Dashboard/login_trans.create_account')}}</a></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')


    <script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $('.panel').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection

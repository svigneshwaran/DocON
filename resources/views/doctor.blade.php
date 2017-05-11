@extends('templates.main')
@section('title', 'Doctors - DocON')
@section('content')
    <header id="header_wrapper">
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{URL::asset('/')}}">DocON</a>
                </div>
                <div id="main-nav" class="navbar-collapse collapse navbar-responsive-collapse navStyle">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li><a href="{{URL::asset('/')}}" class="scroll-link">Home</a></li>
                        <li><a href="{{URL::asset('/users')}}" class="scroll-link">User</a></li>
                        <li class="active"><a href="{{URL::asset('/doctors')}}" class="scroll-link">Doctor</a></li>
                        <li><a href="{{URL::asset('/medicalshops')}}" class="scroll-link">Medical Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <!--Hero_Section-->
    <section id="hero_section" class="top_cont_outer">
        <div class="hero_wrapper">
            <div class="container">
                <div class="hero_section">
                    <div class="row">
                        <div class="col-lg-5 col-sm-7">
                            <div class="top_left_cont zoomIn wow animated">
                                <h2><strong>Hey Doc!!</strong></h2>
                                <p>Create your <b>DocON</b> account NOW!!, let your service serve patience via <b>Online</b>.</p>
                                <a href="{{ URL::asset('doctor/signup') }}" class="btn btn-effect scroll-link">Register</a>  <a href="{{ URL::asset('doctor/login') }}" class="btn btn-effect scroll-link">Login</a> </div>
                        </div>
                        <div class="col-lg-7 col-sm-5">
                            <img src="img/doc.png" class="zoomIn wow animated" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Hero_Section-->
    <section id="aboutUs" class="companyInfo">
        <div class="company-ever">
            <div class="container">
                <div class="row company-bg">
                    <div class="col-md-6">
                        <div class="company-thumb">
                             <center><img width="450px" src="img/logo.png" alt=""></center>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content">
                            <h2>Features</h2>
                            <p>1. Easy consultant service.</p>
                             <p>2. Free and Paid service.</p>
                            <p>3. Safe and Secure.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .container -->
        </div>
@endsection


@extends('templates.main')
@section('title', 'Users - DocON')
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
                        <li class="active"><a href="{{URL::asset('/users')}}" class="scroll-link">User</a></li>
                        <li><a href="{{URL::asset('/doctors')}}" class="scroll-link">Doctor</a></li>
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
                                <h2><strong>Hi There</strong></h2>
                                <p>Get your consultant advice via Online.<br><b><i>Never wait to feel better ever again.<b/></i></p>
                                <a href="{{ URL::asset('user/signup') }}" class="btn btn-raised btn-lg">Get Started</a> <a href="{{ URL::asset('user/login') }}" class="btn btn-raised btn-lg">Login</a> </div>
                        </div>
                        <div class="col-lg-7 col-sm-5">
                            <img src="img/user.png" class="zoomIn wow animated" alt="" />
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
                            <center><img width="500px" src="img/logo.png" alt=""></center>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content">
                            <h2>Features</h2>
                            <p>1. Free Consultant Service*.</p>
                            <p>2. Private Chat.</p>
                            <p>3. Easy Interface.</p>
                            <p>4. Purchase Medicines and much more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .container -->
        </div>
    </section>
@endsection


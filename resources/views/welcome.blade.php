@extends('templates.main')
@section('title', 'DocON - Doctors Online')
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
                    <a class="navbar-brand" href="{{URL::asset('/')}}"><!-- <img width="200px" src="img/logo.png" alt=""> -->DocON</a>>
                </div>
                <div id="main-nav" class="navbar-collapse collapse navbar-responsive-collapse navStyle">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li class="active"><a href="{{URL::asset('/')}}" class="scroll-link">Home</a></li>
                        <li><a href="{{URL::asset('/users')}}" class="scroll-link">User</a></li>
                        <li><a href="{{URL::asset('/doctors')}}" class="scroll-link">Doctor</a></li>
                        <li><a href="{{URL::asset('/medicalshops')}}" class="scroll-link">Medical Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <!--Hero_Section-->
    <section id="aboutUs" class="companyInfo">
        <div class="company-ever">
            <div class="container">
                <div class="row company-bg">
                    <div class="col-md-12">
                        <div class="company-thumb">
                           <center><img width="500px" src="img/logo.png" alt=""></center>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="content">
                            <h2>What is DocON?</h2>
                            <p>DocON connects doctors and users via online, in which user can chat with the doctor and much more, it’s not only a Doctor consulting site 😕 ? , Yep, user can buy prescribed medicines in desired pharmacy via online 😃.</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- .container
        </div>
    </section> -->
    <!--Hero_Section-->
    <section id="hero_section" class="top_cont_outer">
        <div class="hero_wrapper">
            <div class="container">
                <div class="hero_section">
                    <!-- <div class="row"> -->
                        <!-- <div class="col-lg-5 col-sm-7"> -->
                            <div class="top_left_cont zoomIn wow animated">
                                <h2>Welcome to Doc<strong>ON</strong></h2>
                                <p><b>DocON</b> connects doctors and users via online, in which user can <i>chat</i> with the doctor and much more, it’s not only a Doctor consulting site 😕?, Yep, user can buy prescribed medicines in desired pharmacy via Online 😃.</div>
                        <!-- </div> -->
                        <!-- <div class="col-lg-3 col-sm-12"> -->
                            <center><img src="img/o.png" class="zoomIn wow animated"  alt="" /></center></p>
                        <!-- </div> -->
                   <!--  </div> -->
                </div>
            </div>
        </div>
    </section>
    
@endsection


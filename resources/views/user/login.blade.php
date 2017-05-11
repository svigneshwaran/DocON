@extends('templates.main')
@section('title', 'Login - DocON')
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
                        <li><a href="{{URL::asset('/doctors')}}" class="scroll-link">Doctor</a></li>
                        <li><a href="{{URL::asset('/medicalshops')}}" class="scroll-link">Medical Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <div class="col-md-12" style="padding-top: 50px;"></div>
        <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
        @if(session('status'))
        @if(session('status') == 1)
        <script type="text/javascript">
            sweetAlert("Sorry...", "Your email is wrong!", "error");
        </script>
        @endif
        @if(session('status') == 2)
        <script type="text/javascript">
            sweetAlert("Sorry...", "Your password is wrong!", "error");
        </script>
        @endif
        @endif
    <div class="container">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="well bs-component">
                <form class="form-horizontal" action="{{ URL::asset('user/login') }}" method="post">
                {{ csrf_field() }}
                    <fieldset>
                        <legend>User Login</legend>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="Email" required class="form-control" name="email" id="inputUser" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="password" required class="form-control" name="password" id="inputPassword" placeholder="Password">
                            </div>
                        </div>

                            <div class="col-md-12" style="padding-top: 10px;">
                                <center>Not a member. Please <a href="{{ URL::asset('user/signup') }}">Register</a></center>
                            </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection


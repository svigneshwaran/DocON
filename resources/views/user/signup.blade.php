@extends('templates.main')
@section('title', 'Sign Up - DocON')
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
            sweetAlert("Sorry...", "Your email is already registered", "error");
        </script>
        @endif
        @endif
    <div class="container">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="well bs-component">
            <form class="form-horizontal" action="{{ URL::asset('user/signup') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <fieldset>
                    <legend>User Registration</legend>
                    <div class="form-group">

                        <div class="col-md-12">
                            <input type="text" required class="form-control" name="name" id="inputUser" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12">
                            <input type="email" required class="form-control" name="email" id="inputUser" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12">
                            <input type="password" required class="form-control" name="password" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Gender</label>

                        <div class="col-md-10">
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios1" value="Male" checked="">
                                    Male
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios2" value="Female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="inputFile" class="col-md-2 control-label">DP</label>

                            <div class="col-md-10 control-label">
                                <input type="text"  readonly class="form-control" placeholder="Browse...">
                                <input type="file" name="profile_pic" required id="inputFile" >
                            </div>
                            <div class="col-md-12" style="padding-top: 10px;">
                                <center>Already a member. Please <a href="{{ URL::asset('user/login') }}">Login</a></center>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>
@endsection


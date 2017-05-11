@extends('templates.main')
@section('title', 'Doctor Sign Up - DocON')
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
            sweetAlert("Sorry...", "Your record is already exist!", "error");
        </script>
        @endif
        @if(session('status') == 2)
        <script type="text/javascript">
            sweetAlert("oops!...", "Something went wrong!", "error");
        </script>
        @endif
        @endif
    <div class="container">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="well bs-component">
                <form class="form-horizontal" action="{{ URL::asset('doctor/signup') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <fieldset>
                        <legend>Doctor Registration</legend>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="username" required class="form-control" name="username" id="inputUser" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="password" required class="form-control" name="password" id="inputPassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="text" required class="form-control" name="name" id="inputUser" placeholder="Doctor Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Gender</label>

                            <div class="col-md-10">
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios1" value="M" checked="">
                                        Male
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios2" value="F">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select111" class="col-md-2 control-label">Speciality</label>

                            <div class="col-md-10">
                                <select id="select111" name="specialist" class="form-control">
                                    <option value="Allergy & Immunology">Allergy & Immunology</option>
                                    <option value="Child & Adolescent Psychiatry">Child & Adolescent Psychiatry</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Plastic Surgery">Plastic Surgery</option>
                                    <option value="Psychiatry">Psychiatry</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="number" required class="form-control" name="mci_reg_num" id="inputUser" placeholder="MCI Register Number">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="text" required class="form-control" name="hospital_name" id="inputUser" placeholder="Hospital Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-md-2 control-label">Address</label>

                            <div class="col-md-10">
                                <textarea class="form-control" name="address" rows="3" id="textArea"></textarea>
                                <span class="help-block">Hospital Address</span>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="number" required class="form-control" name="pincode" id="inputUser" placeholder="Pincode">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="number" required class="form-control" name="phone" id="inputUser" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="email" required class="form-control" name="email" id="inputUser" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <input type="text" required class="form-control" name="website" id="inputUser" placeholder="Website">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Type</label>

                            <div class="col-md-10">
                                <div class="radio radio-primary">
                                    <label>
                                        <input onclick="hideamount();" type="radio" name="free" id="optionsRadios3" value="0" checked="">
                                        Free
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input onclick="showamount();" type="radio" name="free" id="optionsRadios4" value="1">
                                        Paid
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="docamount"></div>


                        <div class="form-group">
                            {{--<label for="inputFile" class="col-md-2 control-label">DP</label>--}}

                            <div class="col-md-12 control-label">
                                <input type="text" readonly class="form-control" placeholder="Browse Profile Pic...">
                                <input type="file" name="profile_pic" required id="inputFile" >
                            </div>
                            <div class="col-md-12" style="padding-top: 10px;">
                                <center>Already a member. Please <a href="{{ URL::asset('doctor/login') }}">Login</a></center>
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
    <script type="text/javascript">
        function showamount() {
            var theDiv = document.getElementById("docamount");
            theDiv.innerHTML += '<div class="form-group"><div class="col-md-12"> <input type="number" required class="form-control" name="amount" id="inputUser" placeholder="Doctor Fee (&#x20b9;)"> </div></div>';
        }
        function hideamount() {
            var myNode = document.getElementById("docamount");
            while (myNode.firstChild) {
                myNode.removeChild(myNode.firstChild);
            }
        }
    </script>
@endsection


@extends('templates.user')
@section('title', 'Doctor Search - DocON')
@section('content')
    <div class="col-md-12 text-center margin-top-50" style="padding-top: 5%;">
        <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
        <form class="form-horizontal" action="{{ URL::asset('/user/doctor_search/results') }}" method="get">
            <div class="form-group">
                <h2>Doctor's Search</h2>
                <div class="col-md-4">
                    <select name="speciality" class="form-control">
                        <option disabled="disabled">Choose Speciality</option>
                        <option value="Allergy & Immunology">Allergy &amp; Immunology</option>
                        <option value="Child & Adolescent Psychiatry">Child &amp; Adolescent Psychiatry</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Plastic Surgery">Plastic Surgery</option>
                        <option value="Psychiatry">Psychiatry</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <input type="text" required class="form-control" name="search" id="inputUser" placeholder="Search by Name, Pincode">
                </div>
            </div>
        </form>
        <div class="row">
        @if($flag==1)
        <?php 
        $count=count($users);
        $i=0;
        while($i<$count)
        {
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ URL::asset('/DoctorImages/'.$users[$i]['profile_pic'])}}" alt="..." class="img-circle">
                    <div class="caption">
                        <h3>Dr.{{$users[$i]['name']}}</h3>@if($users[$i]['free']==0) (Free) @else (Paid) @endif
                         <p>{{$users[$i]['address']}}</p>
                        <p>
                        @if($users[$i]['free']==0)<a href="#" onclick="message1(<?php echo $users[$i]['id'];?>)" class="btn btn-primary" role="button">Chat</a>@endif
                        @if($users[$i]['free']==1)<a href="#" onclick="message(<?php echo $users[$i]['id'];?>)" class="btn btn-primary" role="button">Pay ₹{{$users[$i]['amount']}}</a>@endif
                        </p>
                    </div>
                </div>
            </div>
        <?php
        $i++;
         }?>
        @endif
        @if($flag==2)
        <script type="text/javascript">
            sweetAlert('Sorry,No results found!!');
        </script>
        Sorry,No results found!!
        @endif
        </div>
    </div>
    <script type="text/javascript">
        function message(id){
            swal({
              title: "Are you sure?",
              text: "Do You want to pay?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes!",
              closeOnConfirm: false,
              showLoaderOnConfirm: true,
            },
            function(){
                 window.location.href = id;
            });
        }
        function message1(id){
            window.location.href = id;
        }
    </script>
@endsection
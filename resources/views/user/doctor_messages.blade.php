@extends('templates.user')
@section('title', 'Doctor Messages - DocON')
@section('content')
    <div class="row">
    <div class="col-md-12" style="padding-top: 5%;">
        <h2>Messages</h2>               
        <div class="col-lg-6">
        <div class="panel panel-default">
            <?php
            $users=json_decode($users,true);
            $size=sizeof($users);
            $i=0;
            while($size>$i){
            $size--;
            ?>
            <div class="panel-heading"><img width="100px" src="{{ URL::asset('/DoctorImages/'.$users[$size]['profile_pic'])}}"><a href="{{ URL('/user/doctor_search/'.$users[$size]['doctorid']) }}">Dr.{{$users[$size]['doctor_name']}}</a></div>
            <?php
            }
            ?>
        </div>
        </div>
    </div>
    </div>

@endsection
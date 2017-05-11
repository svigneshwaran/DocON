@extends('templates.user')
@section('title', 'Doctor Dashboard - DocON')
@section('content')
    <div class="row">
        <div class="col-md-12" style="padding-top: 5%;">
            <h2>Messages</h2>
            <div class="col-lg-6">
             <?php
                    $users=json_decode($users,true);
            $size=sizeof($users);
            $i=0;
            while($size>$i){

                $size--;
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><img width="100px" src="{{ URL::asset('/UserImages/'.$users[$size]['profile_pic'])}}"><a href="{{ URL('/doctor/messages/'.$users[$size]['userid']) }}">{{$users[$size]['user_name']}}</a></div>
            <?php
            }
            ?>
                </div>
            </div>
        </div>
    </div>
@endsection
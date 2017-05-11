@extends('templates.user')
@section('title', 'User Dashboard - DocON')
@section('content')
    <div class="col-md-12 text-center margin-top-50" style="padding-top: 20%;">
        <div class="col-md-4 col-md-offset-1">
            <div>
                <div class="muted">
                    <div>
                        <img width="100px" src="{{ URL::asset('img/doctor.png')}}" />
                    </div>
                    <div class="user-selection gothamlight color-black" style="padding-top: 10px;">Want to consult a Doctor?</div>
                </div>
                <div style="padding-top: 10px;">
                <a class="btn-primary btn text-capitalize m-0 padd" href="{{url('/')}}/user/doctor_search" style="padding-top: 10px;">Consult</a>
                </div>
                </div>
        </div>
        <div class="col-md-2"><div class="or-divider"><div class="o-mid">OR</div></div></div>
        <div class="col-md-4">
            <div>
                <div class="muted">
                    <div>
                        <img width="100px" src="{{ URL::asset('img/medical_shop.png')}}" />
                    </div>
                    <div class="user-selection gothamlight color-black" style="padding-top: 10px;">Looking for medicine?</div>
                </div>
                <div style="padding-top: 10px;">
                <a class="btn-primary btn text-capitalize m-0 padd" href="{{url('/')}}/user/medical_shop_search" style="padding-top: 10px;">Find</a>
            </div>
            </div>
        </div>
    </div>
@endsection
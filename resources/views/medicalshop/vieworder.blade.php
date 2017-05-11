@extends('templates.medicalshop')
@section('title', 'Medical Shop Dashboard - DocON')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Prescription</h4>
            </div>
            <div class="content">
            @if($users->medicine !="")
                Prescription:{{$users->medicine}}
            @endif
            @if($users->prescription_image !="")
            Prescription Image:<img src="{{ URL::asset('/PrescriptionImages/'.$users->prescription_image)}}" alt="..." style="height: 200px">
            @endif
            </div>
        </div>
    </div>
@endsection
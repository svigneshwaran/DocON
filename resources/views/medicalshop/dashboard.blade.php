@extends('templates.medicalshop')
@section('title', 'Medical Shop Dashboard - DocON')
@section('content')
<?php 
$json=$users;
$count=sizeof($json);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
        <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
        @if(session('status'))
        @if(session('status') == 2)
        <script type="text/javascript">
            sweetAlert("Sorry...", "This order is canceled!", "error");
        </script>
        @endif
        @if(session('status') == 1)
        <script type="text/javascript">
            sweetAlert("Awesome..", "Medicines will deliver", "success");
        </script>
        @endif
        @endif
                <h4 class="title">Order Details</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Prescription</th>
                    <th>Status</th>
                    <th>Cancel</th>
                    </thead>
                    <tbody>
                    @if($count!=0)
                    <?php 
                    $i=0;
                    while($i<$count) { ?>
                    <tr>
                        <td>{{$json[$i]['id']}}</td>
                        <td>{{$json[$i]['name']}}</td>
                        <td>{{$json[$i]['address']}}</td>
                        <td>{{$json[$i]['phone']}}</td>
                        <td><a href="{{ URL('/medical/vieworder/'.$json[$i]['id']) }}"> View </a> </td>
                        <td><?php if($json[$i]['status']=="1"){?><a class="btn btn-primary" href="{{ URL('/medical/deliverorder/'.$json[$i]['id']) }}" role="button" disabled> Delivered </a><?php } ?>
                        <?php if($json[$i]['status']=="0"){?><a class="btn btn-primary" href="{{ URL('/medical/deliverorder/'.$json[$i]['id']) }}" role="button" disabled> Deliver </a><?php } ?>
                        <?php if($json[$i]['status']==""){?><a class="btn btn-primary" href="{{ URL('/medical/deliverorder/'.$json[$i]['id']) }}" role="button"> Deliver </a><?php } ?></td>
                        <td><?php if($json[$i]['status']=="0"){?><a class="btn btn-danger" href="{{ URL('/medical/cancelorder/'.$json[$i]['id']) }}" role="button" disabled>Canceled</a><?php } ?>
                        <?php if($json[$i]['status']=="1"){?><a class="btn btn-danger" href="{{ URL('/medical/cancelorder/'.$json[$i]['id']) }}" role="button" disabled>Cancel</a><?php } ?>
                        <?php if($json[$i]['status']==""){?><a class="btn btn-danger" href="{{ URL('/medical/cancelorder/'.$json[$i]['id']) }}" role="button" >Cancel</a><?php } ?></td>
                    </tr>
                    <?php $i++; }
                    ?>
                    @endif
                    @if($count == 0)
                    <tr>
                       <td>No record found!!</td>
                    </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
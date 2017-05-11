@extends('templates.user')
@section('title', 'Medical Shop Search - DocON')
@section('content')
<div class="row">
    <div class="col-md-8">
        <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
        @if(session('status'))
        @if(session('status') == 1)
        <script type="text/javascript">
            sweetAlert("Sorry...", "Something went wrong!", "error");
        </script>
        @endif
        @if(session('status') == 2)
        <script type="text/javascript">
            sweetAlert("Please note down your Delivery Id", "<?php echo Session::get('deliveryid'); ?>", "success");
        </script>
        @endif
        @endif
        <div class="card">
            <div class="header">
                <h4 class="title">Order Details</h4>
            </div>
            <div class="content">
                <form action="{{ URL::asset('user/medicine_order') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="shopid" value="{{$shopid}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Prescription</h4>
                                <div class="col-md-5">
                                <input type="file" class="form-control" name="prescription_image">
                                </div>
                                <div class="col-md-1" style="padding-top: 10px;">
                                    OR
                                </div>
                                <div class="col-md-6">
                                <textarea rows="5"  class="form-control" placeholder="Enter Prescription. *Certain Medicines will be given under the Doctor's prescription." name="prescription"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Address</h4>
                                <textarea rows="5" required="required" class="form-control" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Mobile Number</h4>
                               <input type="number" required="required" class="form-control" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Delivery Type</h4>
                            <select class="form-control" name="delivery_type">
                                <option value="pickup">Pickup</option>
                                <option value="cashondelivery">Cash on Delivery</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
</div>
@endsection
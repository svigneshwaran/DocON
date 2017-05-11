@extends('templates.user')
@section('title', 'Medical Shop Search - DocON')
@section('content')
    <div class="col-md-12 text-center margin-top-50">
        <form class="form-horizontal" method="get" action="{{ URL::asset('/user/medical_shop_search_result') }}">
            <div class="form-group">
                <div class="col-md-12">
                    <h2>Medical Shop Search</h2>
                    <input type="text" required class="form-control" name="search" id="inputUser" placeholder="Search by Name, Pincode">
                </div>
            </div>
        </form>
    </div>
    <div class="row">
    @if($flag==0)
        <?php 
        $count=count($users);
        $i=0;
        while($i<$count)
        {
            ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ URL::asset('/ShopLogos/'.$users[$i]['shop_logo'])}}" alt="..." style="height: 200px">
                <div class="caption">
                    <h3>{{$users[$i]['shopname']}}</h3>
                    <p>{{$users[$i]['address']}}</p>

                    <p><a href="{{URL('/user/order_medical/'.$users[$i]['id'])}}" class="btn btn-primary" role="button">Order</a></p>
                </div>
            </div>
        </div>
        <?php
        $i++;
         }?>
    @endif
    @if($flag==1)
    <div class="col-sm-6 col-md-4 text-center" >
    Your search results will display here...!!
    </div>
    @endif
    @if($flag==2)
    <div class="col-sm-6 col-md-4 text-center" >
    Sorry,No results found...!!
    </div>
    @endif
    </div>
@endsection
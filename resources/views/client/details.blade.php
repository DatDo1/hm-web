@extends('layouts.client')
@section('title')
    Chi tiết
@endsection

@section('slider')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7"> 
                <img src="../users/img/{{$news->house->Image}}" alt="" style="width:100%">
            </div>
            <div class="col">
                <div>
                    <div class="col-xs-5">
                        <h3>{{$news->NewsName}}</h3>  
                        <h5 class="" style="color:red"><small>{{$news->HouseStatus}}</small></h5> <br>
                        <div class="row">
                            <h6 class="col-4">
                                Mức giá <br>
                                {{$news->house->Price}} VNĐ
                            </h6>
                            <h6 class="col-4">
                                Diện tích <br>
                                {{$news->house->Area}} m<sup>2</sup>
                            </h6>
                            <h6 class="col-4">
                                Phòng <br>
                                {{$news->house->Room}}
                            </h6>
                        </div>
                        <div class=""><small>{{$news->Description}}</small></div>
                        <h6 class=""><small>{{$news->house->Location}}, {{$news->house->city->CityName}}</small></h6> <br>

                     
                        <div class=""><small>Được đăng bởi</small></div>
                        <h6 class="">
                            <small>{{$news->userInfo->UserName}}</small>
                        </h6>
                        <h6 class="">
                            <small>{{$news->userInfo->Phone}}</small>
                        </h6> <br>
                        <h6 class=""><small>{{$news->StartDate}}</small></h6> 
                    </div> 
                </div>

            </div>
        </div>
    </div>
@endsection

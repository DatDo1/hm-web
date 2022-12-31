@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
<br> <br>
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ session('message') }}</strong> 
    </div>
@endif

<h2 style="color:var(--primary); text-align: center;">Nhà của tôi</h2> <br>
<button style="float: right"><a href="{{route('client.addHouses')}}">Thêm nhà</a></button> <br> <br>
    <div class="containner">
        @foreach($userList as $key => $value)
            @if($value->name == session('user'))
                @foreach($houseList as $house)
                    @if($value->id == $house->UserID)
                    <div style="border: 1px solid black">
                        <div class="row">
                            <div class="col-4"> 
                                <img src="../users/img/{{$house->Image}}" alt="" style="width:100%">
                            </div>
                            <div class="col">
                                <div>
                                    <div class="col-xs-5">
                                        <h4>{{$house->TypeOfHouse}}</h4>  
                                        <h5 class="" style="color:red"><small>{{$house->HouseStatus}}</small></h5> <br>
                                        <div class="row">
                                            <h6 class="col-4">
                                                Mức giá <br>
                                                {{$house->Price}} VNĐ
                                            </h6>
                                            <h6 class="col-4">
                                                Diện tích <br>
                                                {{$house->Area}} m<sup>2</sup>
                                            </h6>
                                            <h6 class="col-4">
                                                Phòng <br>
                                                {{$house->Room}}
                                            </h6>
                                        </div>
                                        <br>
                                        <h6 class=""><small>Địa chỉ: {{$house->Location}}, {{$house->city->CityName}}</small></h6> <br> <br> <br>
             
                                        <form action="my-houses/{{$house->HouseID}}/delete" method="POST">
                                            @csrf @method('DELETE')
                                            <button>
                                                <a href="edit-houses/{{$house->HouseID}}">Sửa</a>
                                            </button>
                                            <button type="submit" name="delete" style="color: #00B98E;">
                                                Xóa
                                            </button>
                                        </form>
                                    </div> 
                                </div>
                
                            </div>
                        </div>
                    </div>
                    <br> <br>
                    @endif
                @endforeach
            @endif
        @endforeach
    
    </div>
@endsection
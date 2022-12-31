@extends('layouts/client')
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

<h2 style="color:var(--primary); text-align: center;">Tin tức của tôi</h2> <br>
    <div class="containner">
        @foreach($userList as $key => $value)
            @if($value->name == session('user'))
                @foreach($newsList as $news)
                    @if($value->userInfo->UserID == $news->UserID)
                    <div style="border: 1px solid black">
                        <div class="row">
                            <div class="col-4"> 
                                <img src="../users/img/{{$news->house->Image}}" alt="" style="width:100%">
                            </div>
                            <div class="col">
                                <div>
                                    <div class="col-xs-5">
                                        <h3>{{$news->NewsName}} (Tin {{$news->TypeOfNews}}) - {{$news->NewsStatus}}</h3>  
                                        <h5 class="" style="color:red"><small>{{$news->HouseStatus}}</small></h5> 
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
                                        <br>
                                        <div class=""><small>{{$news->Description}}</small></div>
                                        <h6 class=""><small>{{$news->house->Location}}, {{$news->house->city->CityName}}</small></h6> 
                                        <h6 class=""><small>{{$news->StartDate}} - {{$news->EndDate}}</small></h6> 
             
                                        <form action="my-news/{{$news->NewsID}}/delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button>
                                                <a href="edit-news/{{$news->NewsID}}">Sửa</a>
                                            </button>
                                            <button type="submit" name="deleteNews" style="color: #00B98E;">
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
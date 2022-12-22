@extends('layouts/client');
@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="containner">
        
        @foreach($userList as $key => $value)
            @if($value->user->name == session('user'))
                @foreach($newsList as $news)
                    @if($value->UserID == $news->UserID)
                    <div style="border: 1px solid black">
                        <div class="row">
                            <div class="col-4"> 
                                <img src="../users/img/{{$news->house->Image}}" alt="" style="width:100%">
                            </div>
                            <div class="col">
                                <div>
                                    <div class="col-xs-5">
                                        <h3>{{$news->NewsName}}</h3>  
                                        <h5 class="" style="color:red"><small>{{$news->house->HouseStatus}}</small></h5> <br>
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
                                        <h6 class=""><small>{{$news->house->Location}}</small></h6> <br>
             
                                        <button>
                                            <a href="editNews/{{}}">Sửa</a>
                                        </button>
                                        <button>
                                            <a href="">Xóa</a>
                                        </button>
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
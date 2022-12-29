@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
<div class="container">
    
    <br> <h3>Sửa thông tin nhà</h3> <br>
    <form action="{{route('client.storeEditHouses')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
            </div>
            <div class="col-10">
                <input class="text-input" type="text" name="houseid" value="{{$houseItem->HouseID}}" hidden required/>
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Loại nhà</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" type="text" name="housetype" value="{{$houseItem->TypeOfHouse}}" required/>
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Diện tích</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" type="text" name="housearea" value="{{$houseItem->Area}}" required/>
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Giá</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" name="houseprice" value="{{$houseItem->Price}}" required/>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Phòng</strong></label>
            </div>
            <div class="col-10">
                <input type="text" class="text-input" name="houseroom" value="{{$houseItem->Room}}" required>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Thành phố</strong></label>
            </div>
            <div class="col-10">
                <select name="housecity" class="text-input">
                <option value="1">Thành phố Hồ Chí Minh</option>
                <option value="2">Đà Nẵng</option>
                <option value="3">Hà Nội</option>
            </select></div>	
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Địa chỉ nhà</strong></label>
            </div>
            <div class="col-10">
                <input type="text" class="text-input" name="houselocation" value="{{$houseItem->Location}}" required>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Hình ảnh</strong></label>
            </div>
            <div class="col-10">
                <div class="col-6">
                    <input type="file" class="text-input" name="houseimage" accept="image/png, image/jpeg" value="" required> 
                </div>
                <div class="col-4" >

                </div>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Hình trước đây</strong></label>
            </div>
            <div class="col-10">
                <div class="col-6">

                </div>
                <div class="col-4" >
                    <img style="width:100%" src="../users/img/{{$houseItem->Image}}" alt="hinh">
                </div>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
               
            </div>
            <div class="col-10">
                <input class="button btn-primary" type="submit" value="Sửa thông tin nhà" />
            </div>
        </div>
    </form>
</div>
@endsection
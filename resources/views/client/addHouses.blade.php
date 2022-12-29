@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
<div class="container">
    <br> <h3>Thêm nhà</h3> <br>
    <form action="{{route('client.storeHouses')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Loại nhà</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" type="text" name="housetype" required/>
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Diện tích (m<sup>2</sup>)</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" type="text" name="housearea" required/>
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Giá</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" name="houseprice" placeholder="Thuê thì giá sẽ là tính theo tháng" required/>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Phòng</strong></label>
            </div>
            <div class="col-10">
                <input type="text" class="text-input" name="houseroom" required>
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
                <input type="text" class="text-input" name="houselocation" required>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Hình ảnh</strong></label>
            </div>
            <div class="col-10">
                <input type="file" class="text-input" name="houseimage" accept="image/png, image/jpeg" required>
            </div>	
        </div> 


        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
               
            </div>
            <div class="col-10">
                <input class="button btn-primary" type="submit" value="Thêm nhà" />
            </div>
        </div>
    </form>
</div>
@endsection
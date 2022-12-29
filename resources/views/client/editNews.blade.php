@extends('layouts/client')
@section('title')
    {{$title}}
@endsection

@section('content')
<div class="container">
    
    <br> <h3>Sửa tin tức</h3> <br>
    <form action="{{route('client.storeEditNews')}}" method="POST">
        
        @csrf
        <div class="row custom-addnews">
            
            <div class="col-10">
                <input class="text-input" type="text" name="newsID" hidden value="{{$newsItem->NewsID}}" required/> 
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Tên tin tức</strong></label>
            </div>
            <div class="col-10">
                <input class="text-input" type="text" name="newsname"  value="{{$newsItem->NewsName}}" required/> 
            </div>
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Loại tin tức</strong></label>
            </div>
            <div class="col-10">
                <select name="newstype" class="text-input">
                    @if($newsItem->TypeOfNews == "thường")
                        <option value="1">Tin thường - 5000VNĐ/ngày</option>
                        <option value="2">Tin Vip - 10000VNĐ/ngày</option>
                    @else
                        <option value="2">Tin Vip - 5000VNĐ/ngày</option>
                        <option value="1">Tin thường - 10000VNĐ/ngày</option>
                    @endif
                </select>
            </div>	
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Chọn nhà</strong></label>
            </div>
            <div class="col-10">
                <select name="newshouse" class="text-input">
                    @foreach($houseItem as $house)    
                        <option value="{{$house->HouseID}}">{{$house->Location}}</option>
                    @endforeach
        
                </select>
            </div>	
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Trạng thái nhà</strong></label>
            </div>
            <div class="col-10">
                <select name="housestatus" class="text-input">
                    @if($newsItem->HouseStatus == "Bán nhà")
                        <option value="1">Bán nhà</option>
                        <option value="2">Thuê nhà</option>
                    @else
                        <option value="2">Thuê nhà</option> 
                        <option value="1">Bán nhà</option> 
                    @endif
                </select>
            </div>	
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Trạng thái tin tức</strong></label>
            </div>
            <div class="col-10">
                <select name="newsstatus" class="text-input">
                    @if($newsItem->NewsStatus == "Đang hoạt động")
                        <option value="1">Đang hoạt động</option>
                        <option value="2">Vô hiệu hóa</option>
                    @else
                        <option value="2">Vô hiệu hóa</option> 
                        <option value="1">Đang hoạt động</option> 
                    @endif
                </select>
            </div>	
        </div>

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Mô tả</strong></label>
            </div>
            <div class="col-10">
                <textarea class="text-input" name="newsdes" rows="4" cols="50">{{$newsItem->Description}}</textarea>
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Ngày bắt đầu</strong></label>
            </div>
            <div class="col-10">
                <input type="date" class="text-input" name="startdate" value="{{$newsItem->StartDate}}" required >
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
                <label><strong>Ngày kết thúc</strong></label>
            </div>
            <div class="col-10">
                <input type="date" class="text-input" name="enddate" required value="{{$newsItem->EndDate}}">
            </div>	
        </div> 

        <div class="row custom-addnews">
            <div class="col-2 text-dark ">
               
            </div>
            <div class="col-10">
                <input class="button btn-primary" type="submit" value="Sửa tin tức" />
            </div>
        </div>

    </form>
</div>
@endsection
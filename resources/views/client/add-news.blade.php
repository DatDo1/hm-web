@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
   <div class="container">
        <h3>Thêm tin tức</h3> <br>
        <form action="{{route('client.storeNews')}}" method="POST">
            @csrf
            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                    <label><strong>Tên tin tức</strong></label>
                </div>
                <div class="col-10">
                    <input class="text-input" type="text" name="newsname" required/>
                </div>
            </div>

            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                    <label><strong>Loại tin tức</strong></label>
                </div>
                <div class="col-10">
                    <select name="newstype" class="text-input">
                    <option value="1">Tin thường - 5000VNĐ/ngày</option>
                    <option value="2">Tin Vip - 10000VNĐ/ngày</option>
                </select></div>	
            </div>

            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                    <label><strong>Chọn nhà</strong></label>
                </div>
                <div class="col-10">
                    <select name="newshouse" class="text-input">
                        @foreach($userList as $key => $value){
                            @if($value->name == session('user')){
                                @foreach($houseList as $itemHouse){
                                    @if($value->id == $itemHouse->UserID){
                                        <option value="{{$itemHouse->HouseID}}">{{$itemHouse->Location}}</option>
                                    }
                                    @endif
                                }@endforeach
                            }@endif
                        }
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
                    <option value="1">Bán nhà</option>
                    <option value="2">Thuê nhà</option>
                </select></div>	
            </div>

            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                    <label><strong>Mô tả</strong></label>
                </div>
                <div class="col-10">
                    <textarea class="text-input" name="newsdes" rows="4" cols="50"> </textarea>
                </div>	
            </div> 

            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                    <label><strong>Ngày bắt đầu</strong></label>
                </div>
                <div class="col-10">
                    <input type="date" class="text-input" name="startdate" required>
                </div>	
            </div> 

            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                    <label><strong>Ngày kết thúc</strong></label>
                </div>
                <div class="col-10">
                    <input type="date" class="text-input" name="enddate" required>
                </div>	
            </div> 

            <div class="row custom-addnews">
                <div class="col-2 text-dark ">
                   
                </div>
                <div class="col-10">
                    <input class="button btn-primary" type="submit" value="Thêm tin tức" />
                </div>
            </div>
        </form>
   </div>
  
@endsection
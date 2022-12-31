<?php

namespace App\Http\Controllers\clientC;

use App\Models\News;
use App\Models\User;
use App\Models\House;
use App\Models\UserInfo;
use Illuminate\Support\Arr;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CNewsController extends Controller
{
    public function __construct(){
        
    } 
    public function index()
    {
        $title = 'Danh sách nhà'; 
        $housesList = House::all();
        $newsList = News::all();
        return View('client.home', compact('title', 'newsList'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sellStatus(){
        $newsList = News::all();
        $sellHouseList = array();
        foreach ($newsList as $key => $value){
            if ($value['HouseStatus']=="Bán nhà"){
                $sellHouseList = Arr::add($sellHouseList, $key , $value); 
            }
        }
        return View('client.sell', compact('sellHouseList'));
    }

    public function rentStatus(){
        $newsList = News::all();
        $rentHouseList = array();
        foreach ($newsList as $key => $value){
            if ($value['HouseStatus']=="Thuê nhà"){
                $rentHouseList = Arr::add($rentHouseList, $key , $value); 
            }
        }
        return View('client.rent', compact('rentHouseList'));
    }

    public function detailNews($id){
        $data = News::find($id);
        // dd($data->user);
        return View('client.details', ['news'=>$data]);
    }

    public function addNews(){
        $title = 'Tạo tin mới';
        $userList = User::all();
        $houseList = House::all();
        return view('client.add-news', compact('title', 'userList', 'houseList'));
    }

    public function storeNews(Request $request){
        $data = $request->input();
        $userList = User::all();
        $houseList = House::all();

        $newsName = $data['newsname'];
        $newsType = $data['newstype'];
        $newsHouse = $data['newshouse'];
        $houseStatus = $data['housestatus'];
        $newsDes = $data['newsdes'];
        $startDate = $data['startdate'];
        $endDate = $data['enddate'];

        $news = new News();
        $news->NewsName = $newsName;
        if($houseStatus == 1){
            $news->HouseStatus = 'Bán nhà';
        }else {
            $news->HouseStatus = 'Thuê nhà';
        }
        if($newsType == 1){
            $news->TypeOfNews = 'thường';
            $news->NewsPrice = 5000;
        }else {
            $news->TypeOfNews = 'vip';
            $news->NewsPrice = 10000;
        }
        $news->NewsStatus = 'Đang hoạt động';
        $news->Description = $newsDes;
        $news->StartDate = $startDate; 
        $news->EndDate = $endDate;
        
        foreach($userList as $key => $value){
            if($value->id == session('userID')){
                $news->UserID = $value->id;
                foreach($houseList as $itemHouse){
                    if($value->id == $itemHouse->UserID){
                        $news->HouseID = $newsHouse;
                    }
                }
            }
        }
        
        $news->save();
        return redirect('');
    }

    public function myNews(){
        $title = 'Danh sách tin';
        $userList = User::all();
        $houseList = House::all();
        $newsList = News::all();
        return View('client.myNews', compact('title','userList','houseList','newsList'));
    }

    public function editNews($idNews){  //news id
        $title = 'Sửa tin tức';
        $newsItem = new News();
        $houseItem = [];
        $houseList = House::all();
        $newsList = News::all();
        $userList = UserInfo::all();
        foreach($newsList as $key => $value){
            if($value->NewsID == $idNews){
                $newsItem = $value;
            }
        }
        // dd($newsItem);
        foreach($houseList as $key => $value){
            if($value->UserID == $newsItem['UserID']){
                $houseItem = Arr::add($houseItem, $key, $value);
            }
        }
         
        return View('client.editNews', compact('title','newsItem','houseItem'));
    }

    public function storeEditNews(Request $request){
        $data = $request->input();

        $newsList = News::all();
        $userList = UserInfo::all();
        $houseList = House::all();
        
        $newsID = $data['newsID'];
        $newsName = $data['newsname'];
        $newsType = $data['newstype'];
        $houseStatus = $data['housestatus'];
        $newsStatus = $data['newsstatus'];
        $newsHouse = $data['newshouse'];
        $newsDes = $data['newsdes'];
        $startDate = $data['startdate'];
        $endDate = $data['enddate'];

        foreach($newsList as $news){
            if($news->NewsID == $newsID){
                
                $news->NewsName = $newsName;
                if($newsType == 1){
                    $news->TypeOfNews = 'thường';
                    $news->NewsPrice = 5000;
                }else {
                    $news->TypeOfNews = 'vip';
                    $news->NewsPrice = 10000;
                }

                if($houseStatus == 1){
                    $news->HouseStatus = 'Bán nhà';
                }else {
                    $news->HouseStatus = 'Thuê nhà';
                }

                if($newsStatus == 1){
                    $news->NewsStatus = 'Đang hoạt động';
                }else {
                    $news->NewsStatus = 'Vô hiệu hóa';
                }

                $news->Description = $newsDes;
                $news->StartDate = $startDate; 
                $news->EndDate = $endDate;
                
                foreach($userList as $key => $value){
                    if($value->UserID == session('UserID')){
                        $news->UserID = $value->UserID;
                        foreach($houseList as $itemHouse){
                            if($value->UserID == $itemHouse->UserID){
                                $news->HouseID = $newsHouse;
                            }
                        }
                    }
                }
                $news->save();
            }
        } 
        return redirect('my-news');
    }

    public function deleteNews($id){
        $news = News::find($id);
        if($news->delete()){
            return redirect('my-news')->with('message', 'Xóa tin tức thành công!!');
        }
        return redirect('my-news')->with('message', 'Xóa tin tức thất bại!!');
    }

    public function searchNews(Request $request){
        $data = $request->all();
        $allNews = News::all();
        $newsList = [];

        foreach($allNews as $key => $news){
            if($data['housetype'] == $news->house->TypeOfHouse){
                if($data['housecity'] == $news->house->city->CityName){
                    $newsList = Arr::add($newsList, $key, $news); 
                }
            }
        }
        return View('client.home', compact('newsList'));

    }
   
}

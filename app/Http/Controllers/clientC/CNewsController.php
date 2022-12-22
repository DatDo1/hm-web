<?php

namespace App\Http\Controllers\clientC;

use App\Models\News;
use App\Models\House;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserInfo;

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
        $housesList = House::all();
        $sellHouseList = array();
        foreach ($housesList as $key => $value){
            if ($value['HouseStatus']=="Đang bán"){
                $sellHouseList = Arr::add($sellHouseList, $key , $value); 
            }
        }
        return View('client.sell', compact('sellHouseList'));
    }

    public function detailNews($id){
        $newsList = News::all();
        $data = News::find($id);
        return View('client.details', ['news'=>$data]);
    }

    public function addNews(){
        $title = 'Tạo tin mới';
        $userList = UserInfo::all();
        $houseList = House::all();
        return view('client.add-news', compact('title', 'userList', 'houseList'));
    }

    public function storeNews(Request $request){
        $data = $request->input();
        $userList = UserInfo::all();
        $houseList = House::all();

        $newsName = $data['newsname'];
        $newsType = $data['newstype'];
        $newsHouse = $data['newshouse'];
        $newsDes = $data['newsdes'];
        $startDate = $data['startdate'];
        $endDate = $data['enddate'];

        $news = new News();
        $news->NewsName = $newsName;
        if($newsType == 1){
            $news->TypeOfNews = 'thường';
            $news->NewsPrice = 5000;
        }else {
            $news->TypeOfNews = 'vip';
            $news->NewsPrice = 10000;
        }
        $news->Description = $newsDes;
        $news->StartDate = $startDate; 
        $news->EndDate = $endDate;
        
        foreach($userList as $key => $value){
            if($value->user->name == session('user')){
                $news->UserID = $value->UserID;
                foreach($houseList as $itemHouse){
                    if($value->UserID == $itemHouse->UserID){
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
        $userList = UserInfo::all();
        $houseList = House::all();
        $newsList = News::all();
        return View('client.myNews', compact('title','userList','houseList','newsList'));
    }

    public function editNews($id){
        
    }
}

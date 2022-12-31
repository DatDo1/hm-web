<?php

namespace App\Http\Controllers\clientC;

use App\Models\City;
use App\Models\News;
use App\Models\User;
use App\Models\House;
use App\Models\UserInfo;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CHousesController extends Controller
{
    private $house;
    public function __construct()
    {
        $this->house = new House();
    }
    public function index()
    {
        $title = 'Danh sách nhà';
        $housesList = House::all();
        return View('client.home', compact('title', 'housesList'));
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

    public function myHouses(){
        $title = 'Danh sách nhà';
        $userList = User::all();
        $houseList = House::all();
        $newsList = News::all();
        return View('client.myHouses', compact('title','userList','houseList','newsList'));
    }

    public function addHouses(){
        $title = 'Thêm nhà';
        $userList = UserInfo::all();
        $houseList = House::all();
        $newsList = News::all();
        return View('client.addHouses', compact('title','userList','houseList','newsList'));
    }

    public function storeHouses(Request $request){
        $userList = User::all();
        $data = $request->input();
        $houseType = $data['housetype'];
        $houseArea = $data['housearea'];
        $housePrice = $data['houseprice'];
        $houseRoom = $data['houseroom'];
        if($data['housecity'] == 1){
            $houseCity = 7;
        }else if($data['housecity'] == 2){
            $houseCity = 8;
        }else{
            $houseCity = 9;
        }
        $houseLocation = $data['houselocation'];

        $house = new House();
        $house->TypeOfHouse = $houseType;
        $house->Area = $houseArea;
        $house->Location = $houseLocation;
        $house->Room = $houseRoom;
        $house->Price = $housePrice;
        $house->CityID = $houseCity;
        foreach ($userList as $user) {
            // dd(session('userID'));
            if($user->id == session('userID')){  
                $house->UserID = $user->id;
               ;
            }
        }
        $imageName = time().'.'.$request->houseimage->extension();  
        $house->Image = $imageName;
        $house->updated_at = now();
        $house->created_at = now();

        if($house->save()){
            $request->houseimage->move(public_path('users/img'), $imageName);
        }
        return redirect('my-houses');
    }

    public function editHouses($idHouse){    
        $title = 'Sửa thông tin nhà';
        $houseItem = new News();
        $cityItem = [];
        $houseList = House::all();
        $cityList = City::all();
        foreach($houseList as $key => $value){
            if($value->HouseID == $idHouse){
                $houseItem = $value;
            }
        }
        return View('client.editHouses', compact('title','houseItem'));
    }

    public function storeEditHouses(Request $request){
        $userList = UserInfo::all();
        $houseList = House::all();
        $data = $request->input();

        $houseID = $data['houseid'];
        $houseType = $data['housetype'];
        $houseArea = $data['housearea'];
        $housePrice = $data['houseprice'];
        $houseRoom = $data['houseroom'];
        if($data['housecity'] == 1){
            $houseCity = 7;
        }else if($data['housecity'] == 2){
            $houseCity = 8;
        }else{
            $houseCity = 9;
        }
        $houseLocation = $data['houselocation'];

        foreach($houseList as $house){
            if($house->HouseID == $houseID){
                $house->TypeOfHouse = $houseType;
                $house->Area = $houseArea;
                $house->Location = $houseLocation;
                $house->Room = $houseRoom;
                $house->Price = $housePrice;
                $house->CityID = $houseCity;
                foreach ($userList as $user) {
                    if($user->UserID == session('userID')){  //khong nen dung session la ten user (trung)
                        $house->UserID = $user->UserID;  
                    }
                }
                $imageName = time().'.'.$request->houseimage->extension();  
                $house->Image = $imageName;
                $house->updated_at = now();
                $house->created_at = now();    
               
                if($house->save()){     //Lưu hình mới nhưng không xóa hình cũ 
                    $request->houseimage->move(public_path('users/img'), $imageName);  
                }
            }
        }
        
        return redirect('my-houses');
    }

    public function deleteHouse($id){
        $house = (House::find($id));
        if($house->delete()){
            return redirect('my-houses')->with('message', 'Xóa nhà thành công!!');
        }
        return redirect('my-houses')->with('message', 'Xóa nhà thất bại!!');
    }
}

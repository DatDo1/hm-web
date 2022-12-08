<?php

namespace App\Http\Controllers\adminC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;

class HousesController extends Controller
{
    private $house;
    public function __construct(){
        $this->house = new House();
    }
    public function index(){
        $title = 'Danh sách nhà'; 
        $housesList = House::all();// $this->house->getAllHouses();
        return View('admin.houses', compact('title', 'housesList'));
    }
}

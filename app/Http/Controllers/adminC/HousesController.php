<?php

namespace App\Http\Controllers\adminC;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HousesController extends Controller
{
    private $house;
    public function __construct()
    {
        $this->house = new House();
    }
    public function index()
    {
        if (Auth::check() || session('user')) {
            $title = 'Danh sách nhà';
            $housesList = House::all(); // $this->house->getAllHouses();
            return View('admin.houses', compact('title', 'housesList'));
        }else {
            return redirect('login');
        }
    }
}

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
        if (Auth::check() || session('userID')) {
            if (session('RoleID') == 1) {
                $title = 'Danh sách nhà';
                $housesList = House::all();
                return View('admin.houses', compact('title', 'housesList'));
            }else {
                return redirect('');
            }
        }else {
            return redirect('login');
        }
    }
}

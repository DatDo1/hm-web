<?php

namespace App\Http\Controllers\adminC;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $users;
    public function __construct() {
        
    }

    public function index() {
        if(Auth::check() || session('userID')) {
            if(session('RoleID') == 1){
                $title ='Danh sách người dùng';
                $usersList = UserInfo::all();
                return view('admin.users', compact('title', 'usersList'));
            }else {
                return redirect('');
            }
        }else {
            return redirect('login');
        }
       
    }

}

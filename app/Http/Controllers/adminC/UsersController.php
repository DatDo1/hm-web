<?php

namespace App\Http\Controllers\adminC;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $users;
    public function __construct() {
        $this->users = new User();
    }

    public function index() {
        if(Auth::check()) {
            $title ='Danh sách người dùng';
            $usersList = User::all();
            return view('admin.users', compact('title', 'usersList'));
        }else {
            return redirect('login');
        }
       
    }
    public function add(){
        $title = 'Thêm người dùng';
        
    }
}

<?php

namespace App\Http\Controllers\adminC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    private $users;
    public function __construct() {
        $this->users = new User();
    }

    public function index() {
        $title ='Danh sách người dùng';
        $usersList = User::all();

        return view('admin.users', compact('title', 'usersList'));
    }
    public function add(){
        $title = 'Thêm người dùng';
        
    }
}

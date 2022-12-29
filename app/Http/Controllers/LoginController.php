<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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

    public function checkValidate(Request $request)
    {
        $messages = [
            'required' => ':attribute nhập không hợp lệ',
            // 'min' => ':attribute không được nhỏ hơn :min ký tự'
        ];
        $attributes = [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ];

        $rules = [
            'email' => 'required|unique:users',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        // $validator->validate();
        return back()->withErrors($validator);
        // dd($validator);
    }

    public function userLogin(Request $request)
    {
        $data = $request->input();
       
        $userList = UserInfo::all();
        $messageAnou = 'Tài khoản hoặc mật khẩu không chính xác';
        foreach ($userList as $key => $value) {
            if($data['email'] == $value->user->email && Hash::check($data['password'], $value->user->password)) {
                if ($value->RoleID == 1) {
                    
                    $request->session()->put('user', $value->user->name);
                    $request->session()->put('userID', $value->UserID);
                    $request->session()->put('RoleID', $value->RoleID);
                    return redirect('admin/houses-management');
                } else if ($value->RoleID == 0) {
                    $request->session()->put('user',  $value->user->name);
                    $request->session()->put('userID', $value->UserID);
                    return redirect('');
                }
            }
        }

        return redirect('login')->with('message', $messageAnou);
    }
    public function adminLogout(Request $request)
    {
        if (session()->has('userID')) {
            session()->pull('user');
            session()->pull('userID');
            session()->pull('RoleID');
        }
        return redirect('login');
    }

    public function userLogout(Request $request){
        if (session()->has('user')) {
            session()->pull('user');
            session()->pull('userID');
        }
        return redirect('');
    }
}

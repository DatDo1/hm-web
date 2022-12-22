<?php

namespace App\Http\Controllers\clientC;

use App\Models\House;
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

    public function sellStatus()
    {
        $housesList = House::all();
        $sellHouseList = array();
        foreach ($housesList as $key => $value) {
            if ($value['HouseStatus'] == "Đang bán") {
                $sellHouseList = Arr::add($sellHouseList, $key, $value);
            }
        }
        return View('client.sell', compact('sellHouseList'));
    }


}

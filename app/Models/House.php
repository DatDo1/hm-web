<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class House extends Model
{
    use HasFactory;
    // public function getAllHouses(){
    //     $houses = DB::select("SELECT * FROM house");
    //     return $houses;
    // }

    protected $table="house";
    protected $primaryKey="HouseID";

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function news(){
        return $this->hasMany(News::class, 'NewsID');
    }

}


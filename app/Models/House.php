<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class House extends Model
{
    use HasFactory;

    protected $table="house";
    protected $primaryKey="HouseID";

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'CityID');
    }

    public function news(){
        return $this->hasMany(News::class, 'NewsID');
    }


}


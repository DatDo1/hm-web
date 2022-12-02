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
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

   // return $this->belongsTo(Post::class);
   protected $table="house";
   protected $primaryKey="HouseID";

}


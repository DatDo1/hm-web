<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = "NewsID";

    public function house(){
        return $this->belongsTo(House::class, 'HouseID');
    }

    public function userInfo(){
        return $this->belongsTo(UserInfo::class, 'UserID');
    }
}



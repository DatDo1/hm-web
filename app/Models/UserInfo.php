<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table="user";
    protected $primaryKey="UserID";

    public function house(){
        return $this->hasMany(House::class, 'HouseID');
    }

    public function news(){
        return $this->hasMany(News::class, 'NewsID');
    }

    public function user(){
        return $this->hasOne(User::class, 'id');
    }
}

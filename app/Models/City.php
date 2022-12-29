<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table="city";
    protected $primaryKey="CityID";

    public function house()
    {
        return $this->hasMany(House::class, 'HouseID');
    }
}

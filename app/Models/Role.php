<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table="role";
    protected $primaryKey="RoleID";

    public function userInfo()
    {
        return $this->hasMany(UserInfo::class, 'UserID');
    }
}

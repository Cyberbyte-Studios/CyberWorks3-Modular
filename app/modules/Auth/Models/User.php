<?php

namespace CyberWorks\Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'cw_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
        'steam_id',
        'profilePicture'
    ];
}
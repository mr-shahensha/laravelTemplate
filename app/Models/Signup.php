<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    use HasFactory;
    protected $table = "main_signup";
    protected $primaryKey = "id";
    protected $fillable = [
        'username',
        'password',
        'pass',
        'name',
        'mob',
        'mail',
        'address',
        'actnum',
        'userlevel',
        'signupdate',
        'lastlogin',
        'lastloginfail',
        'numloginfail',
        'stat',
        'edt',
        'edtm',
        'eby',
        'udt',
        'udtm',
        'uby',
    ];
}

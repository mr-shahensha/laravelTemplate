<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    protected $table="main_user_type";
    protected $primaryKey="id";
    protected $fillable=[
        'typ',
        'lvl',
        'stat'
    ];
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="users";
    protected $primaryKey="id";
    protected $fillable = [
        'name',
        'email',
        'password',
        'deptNm',
        'desigNm',
        'edt',
        'edtm',
        'eby',
        'udt',
        'udtm',
        'uby'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getDepartment(){
        return $this->hasOne(Department::class,"id","deptNm");
    }
    public function getDesignation(){
        return $this->hasOne(Designation::class,"id","desigNm");
    }
}

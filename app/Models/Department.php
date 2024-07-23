<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table="department";
    protected $primaryKey="id";
    protected $fillable=[
        'deptNm',
        'stat',
        'edt',
        'edtm',
        'edtm',
        'eby',
        'udt',
        'udtm',
        'eby'
    ];

}

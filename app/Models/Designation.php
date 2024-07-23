<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table="designation";
    protected $primaryKey="id";
    protected $fillable=[
        'deptNm',
        'desigNm',
        'stat',
        'edt',
        'edtm',
        'edtm',
        'eby',
        'udt',
        'udtm',
        'eby'
    ];
    public function getDepartment(){
        return $this->hasOne(Department::class,"id","deptNm");
    }
}

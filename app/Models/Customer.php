<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table="customer";
    protected $primaryKey="id";
    protected $fillable=[
        'id',
        'custId',
        'custName',
        'custNumber',
        'custPan',
        'custAdress',
        'custCompany',
        'stat',
        'edt',
        'edtm',
        'eby',
        'udt',
        'udtm',
        'uby'
    ];
}

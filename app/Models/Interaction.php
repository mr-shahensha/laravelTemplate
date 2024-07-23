<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interaction extends Model
{
    use HasFactory;
    protected $table="main_interaction";
    protected $primaryKey="id";
    protected $fillable=[
        'qryid',
        'source',
        'consultant',
        'custNm',
        'custNo',
        'dt',
        'projectTyp',
        'projectDtls',
        'cost',
        'stat',
        'edt',
        'edtm',
        'eby',
        'udt',
        'udtm',
        'uby'
    ];

}

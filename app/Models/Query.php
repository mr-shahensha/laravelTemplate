<?php

namespace App\Models;

use App\Models\Interaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Query extends Model
{
    use HasFactory;
    protected $table="main_query";
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
    public function getCount(){
        return $this->hasMany(Interaction::class,"qryid","qryid");
    }
    public function getCustomer(){
        return $this->hasOne(Customer::class,"custId","custId");
    }
}

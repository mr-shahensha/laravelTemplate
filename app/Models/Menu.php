<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table="main_menu";
    protected $primaryKey="id";
    protected $fillable=[
        'rootOrder',
        'menuName',
        'pageUrl',
        'menuOrder',
        'user',
        'stat',
        'edt',
        'edtm',
        'eby'
    ];
    public function getMenu(){
        return $this->hasOne(Menu::class,'id','rootOrder');
    }
}

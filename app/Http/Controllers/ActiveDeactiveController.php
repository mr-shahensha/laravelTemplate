<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveDeactiveController extends Controller
{
    public function index($tbl,$pg,$stat,$id){
        $mdl="App\Models\\".$tbl;
        $dlt=$mdl::find($id);
        $dlt->stat = $stat;
        $udt = date('Y-m-d');
        $udtm = date('Y-m-d H:i:s A');
        $dlt->udt = $udt;
        $dlt->udtm = $udtm;
        $dlt->uby = session()->get('username');
        $dlt->update();
        if($stat==0){
            session()->flash('alert2', 'Data activated');
            session()->flash('color2', 'success');
        }
        if($stat==1){
            session()->flash('alert2', 'Data de-activated');
            session()->flash('color2', 'warning');
        }

        return redirect()->route($pg);
    }
}

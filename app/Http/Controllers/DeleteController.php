<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DeleteController extends Controller
{
    public function index($tbl,$pg,$id){
        $mdl="App\Models\\".$tbl;
        $dlt=$mdl::find($id);
        // return $dlt.'-'.$id;
        $dlt->delete();
        session()->flash('alert2', 'Data deleted succesfully');
        session()->flash('color2', 'danger');
        return redirect()->route($pg);
    }
}

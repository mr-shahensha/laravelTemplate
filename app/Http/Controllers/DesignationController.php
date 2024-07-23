<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(){
        $dept=Department::where('stat','=','0')->orderBy('deptNm','asc')->get();
        $desg=Designation::orderBy('deptNm','asc')->get();
        $data=compact('dept','desg');
        return view('admin.designation')->with($data);
    }
    public function designationSubmit(Request $request){
        $request->validate([
            'deptNm'=>'required',
            'desigNm'=>'required'
        ]);
        $chkDesig=Designation::where('deptNm','=',$request['deptNm'])->where('desigNm','=',$request['desigNm'])->get();
        if(count($chkDesig)>0){
            session()->flash('alert','Data aready exsist');
            session()->flash('color', 'danger');

        }else{
        $edt=date('Y-m-d');
        $edtm=date('Y-m-d H:i:s A');
        $desg=New Designation();
        $desg->deptNm=$request->input('deptNm');
        $desg->desigNm=$request->input('desigNm');
        $desg->edt=$edt;
        $desg->edtm=$edtm;
        $desg->eby=session()->get('username');
        $desg->save();
        session()->flash('alert','Submitted succesfull');
        session()->flash('color', 'success');

        }
        return redirect('designation');
    }
    public function designationEdit($id){
        $ids = base64_decode($id);
        $depts=Department::orderBy('deptNm','asc')->get();
        $desgs=Designation::find($ids);


        $data=compact('depts','desgs');
        return view('admin.designationEdit')->with($data);
    }
    public function designationEdits(Request $request,$id){
        $request->validate([
            'deptNm'=>'required',
            'desigNm'=>'required'
        ]);
        $chkDesig=Designation::where('deptNm','=',$request['deptNm'])->where('desigNm','=',$request['desigNm'])->get();
        if(count($chkDesig)>0){
            session()->flash('alert','Data aready exsist');
            session()->flash('color', 'danger');

        }else{
        $edt=date('Y-m-d');
        $edtm=date('Y-m-d H:i:s A');
        $desg=Designation::find($id);
        $desg->deptNm=$request->input('deptNm');
        $desg->desigNm=$request->input('desigNm');
        $desg->udt=$edt;
        $desg->udtm=$edtm;
        $desg->uby=session()->get('username');
        $desg->update();
        session()->flash('alert2','Updated succesfully');
        session()->flash('color2', 'success');

        }
        return redirect('designation');
    }
}

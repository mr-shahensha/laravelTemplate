<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $depts = Department::orderBy('deptNm', 'asc')->get();
        return view('admin.department', ['depts' => $depts]);
    }
    public function departmentSubmit(Request $request)
    {
        $request->validate([
            "deptNm" => "required"
        ]);
        $chkDept = Department::where('deptNm', '=', $request['deptNm'])->get();
        if (count($chkDept) > 0) {
            session()->flash('alert', 'Data aready exists');
            session()->flash('color', 'danger');
        } else {
            $edt = date('Y-m-d');
            $edtm = date('Y-m-d H:i:s A');
            $dept = new Department();
            $dept->deptNm = $request->input('deptNm');
            $dept->edt = $edt;
            $dept->edtm = $edtm;
            $dept->eby = session()->get('username');
            $dept->save();
            session()->flash('alert', 'Submitted Succesfully');
            session()->flash('color', 'success');

        }
        return redirect('/department');
    }
    public function departmentEdit($id)
    {
        $ids = base64_decode($id);
        $dept = Department::find($ids);
        return view('admin.departmentEdit', ['dept' => $dept]);
    }
    public function departmentEdits(Request $request, $id)
    {
        $request->validate([
            "deptNm" => "required"
        ]);
        $udt = date('Y-m-d');
        $udtm = date('Y-m-d H:i:s A');
        $dept = Department::find($id);
        $dept->deptNm = $request->input('deptNm');
        $dept->udt = $udt;
        $dept->udtm = $udtm;
        $dept->uby = session()->get('username');
        $dept->update();
        session()->flash('alert2', 'Data Updated succesfully');
        session()->flash('color2', 'success');
        return redirect('/department');
    }

}

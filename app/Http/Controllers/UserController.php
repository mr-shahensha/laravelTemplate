<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Signup;
use App\Models\User;
use App\Models\Designation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $depts = Department::orderBy('deptNm', 'asc')->get()->toArray();

        // return view('admin.userSetup', ['depts' => $depts]);
        $depts = Department::orderBy('deptNm', 'asc')->get();
        $users = User::orderBy('deptNm', 'asc')->get();
        $data = compact('depts', 'users');
        return view('admin.userSetup')->with($data);
    }

    public function userSubmit(Request $request)
    {
        $request->validate([
            'deptNm' => 'required',
            'desigNm' => 'required',
            'name' => 'required'
        ]);
        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $slx = rand(0000, 9999);
        $username = 'e' . date('d') . date('m') . date('Y') . $slx;
        $user = new User();
        $user->username = $username;
        $user->deptNm = $request->input('deptNm');
        $user->desigNm = $request->input('desigNm');
        $user->name = $request->input('name');
        $user->edt = $edt;
        $user->edtm = $edtm;
        $user->eby = session()->get('username');
        $user->save();


        $users = new Signup();
        $users->username = $username;
        $users->password = $username;
        $users->pass = md5($username);
        $users->name = $request->input('name');
        $users->userlevel = 2;
        $users->signupdate = $edt;
        $users->edt = $edt;
        $users->edtm = $edtm;
        $users->eby = session()->get('username');
        $users->save();
        session()->flash('alert', 'User Create Succesfully');
        session()->flash('color', 'success');
        return redirect('/userSetup');
    }
    public function userEdit($id)
    {
        $ids = base64_decode($id);
        $depts = Department::orderBy('deptNm', 'asc')->get();
        $Designation = Designation::get();
        $users = User::find($ids);

        $data = compact('depts', 'users', 'Designation');
        return view('admin.userEdit')->with($data);
    }
    public function userEdits(Request $request, $username)
    {
        $request->validate([
            'deptNm' => 'required',
            'desigNm' => 'required',
            'name' => 'required'
        ]);
        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $user = User::where('username', $username)->first();
        $user->deptNm = $request->input('deptNm');
        $user->desigNm = $request->input('desigNm');
        $user->name = $request->input('name');
        $user->udt = $edt;
        $user->udtm = $edtm;
        $user->uby = session()->get('username');
        $user->update();

        $user1 = Signup::where('username', $username)->first();
        $user1->name = $request->input('name');
        $user1->udt = $edt;
        $user1->udtm = $edtm;
        $user1->uby = session()->get('username');
        $user1->update();
        session()->flash('alert2', 'User Updated Succesfully');
        session()->flash('color2', 'success');
        return redirect('/userSetup');
    }
}

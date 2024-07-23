<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogController extends Controller
{

    public function index()
    {
        // if(session()->has('isLoged') ){
        //     return view('admin.index');
        // }else{
            return view('admin.login');
       // }

    }
    public function loggedIn(Request $request)
    {
        $request->validate([
            'username' => ['required', 'min:5'],
            'password' => ['required', 'min:5']
        ]);
        $mdpass = md5($request->password);
        $callSignup = Signup::where('username', '=', $request->username)->get();
        $cnt = $callSignup->count();

        $msg = "";
        if ($cnt > 0) { //searching by username
            $editSignup = Signup::find($callSignup->first()->id);
            $lgtm = date('Y-m-d H:i:s A');
            if ($callSignup->first()->actnum == 0 && $callSignup->first()->stat == 0) {
                if ($callSignup->first()->userlevel < 0) {
                    if ($callSignup->first()->pass == $mdpass) {

                        $editSignup->numloginfail = 0;
                        $editSignup->lastlogin = $lgtm;
                        $editSignup->update();

                        session([
                            'isLoged' => true,
                            'username' => $request->username,
                            'password' => $mdpass,
                            'name' => $callSignup->first()->name,
                            'userlevel' => $callSignup->first()->userlevel,
                            'mobile' => $callSignup->first()->mob,
                        ]);

                        return redirect('/');
                    } else {
                        $nmf = $callSignup->first()->numloginfail;
                        $nmfs = $nmf + 1;

                        $editSignup->numloginfail = $nmfs;
                        $editSignup->lastloginfail = $lgtm;
                        if ($nmfs == 5) {
                            $editSignup->actnum = 1;
                        }
                        $editSignup->update();
                        $msg = "You have entered wrong password";
                    }
                } else {
                    $msg = "User Level is not high enough";
                }
            } else {
                $msg = "Account no activated";
            }
        } else {
            $msg = "No user found";
        }

        if ($msg != "") {
            Session::flash('message', $msg);
            return redirect('login');
        }
    }
    public function logout()
    {
        session()->forget('username');
        session()->forget('password');
        return redirect('login');
    }
    public function noAccess(){
            return view('admin.noAccess');
    }
}

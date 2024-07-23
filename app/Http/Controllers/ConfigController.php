<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\UserType;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(){
            $menus = Menu::where('id', '>', '0')->with('getMenu')->get();
            $userTypes=UserType::where('id', '>', '0')->get();
            $data=compact('menus','userTypes');
           // return $navMenus;
        return view('admin.menuSetup')->with($data);
    }
    public function menuSubmit(Request $request){
        $request->validate([
                'rootOrder'=>'required',
                'menuName'=>'required',
        ]);
        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $menu= new Menu();
        $menu->rootOrder=$request->input('rootOrder');
        $menu->menuName=$request->input('menuName');
        if($request->pageUrl!=""){
             $menu->pageUrl=$request->input('pageUrl');
        }
        if($request->menuOrder!=""){
            $menu->menuOrder=$request->input('menuOrder');
        }
        $menu->edt=$edt;
        $menu->edtm=$edtm;
        $menu->eby=session()->get('username');
        $menu->save();
        session()->flash('alert','Submitted succesfull');
        session()->flash('color', 'success');
        return redirect('/menuSetup');
    }
    public function menuSetupEdit($id){
        $idd=base64_decode($id);
        $editMenu=Menu::where('id','=',$idd)->first();

        $menus = Menu::where('id', '>', '0')->get();

        $data=compact('editMenu','menus');
        return view('admin.menuSetupEdit')->with($data);
    }
    public function menuSetupEdits(Request $request,$id){
        $request->validate([
            'rootOrder'=>'required',
            'menuName'=>'required',
        ]);
        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $menu= Menu::find($id);
        $menu->rootOrder=$request->input('rootOrder');
        $menu->menuName=$request->input('menuName');
        if($request->pageUrl!=""){
            $menu->pageUrl=$request->input('pageUrl');
        }
        if($request->menuOrder!=""){
            $menu->menuOrder=$request->input('menuOrder');
        }
        $menu->udt=$edt;
        $menu->udtm=$edtm;
        $menu->uby=session()->get('username');
        $menu->update();
        session()->flash('alert2','Updatted succesfully');
        session()->flash('color2', 'success');
        return redirect('/menuSetup');
    }
    public function menuAssign(Request $request){
        $request->validate([
            'user'=>'required'
        ]);
    }
}

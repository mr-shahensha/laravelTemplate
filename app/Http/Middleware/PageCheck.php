<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Menu;
use Illuminate\Http\Request;

class PageCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $isAccess = false;
        $acCheck = 0;
        $menus = [];
        if (session()->has('isLoged')) {
            $userLogged = session()->has('userlevel');
        } else {
            $userLogged = "XXXXX";
        }
        $rmenus = Menu::where('rootOrder', '=', '0')->whereRaw('(stat=0 and isAll = 0 OR FIND_IN_SET(?, user))', [$userLogged])->orderBy('menuOrder','asc')->get()->toArray();
        foreach ($rmenus as $rmenu) {
            $rsl = $rmenu['id'];
            if ($acCheck == 0) {
                $isc = $request->is($rmenu['pageUrl']);
                if ($isc) {
                    $isAccess = true;
                    $acCheck = 1;
                }
            }
            $smenus = Menu::where('rootOrder', '=', $rsl)->whereRaw('(stat=0 and isAll=0 OR FIND_IN_SET(?, user))', [$userLogged])->orderBy('menuOrder','asc')->get()->toArray();
            foreach ($smenus as $smenu) {
                if ($acCheck == 0) {

                    $isc = $request->is($smenu['pageUrl']);
                    $iscw = $request->is($smenu['pageUrl'] . "/*");
                    if ($isc or $iscw) {
                        $isAccess = true;
                        $acCheck = 1;
                    }
                }
            }
            $rmenu["sub_menus"] = $smenus;
            $menus[] = $rmenu;
        }
        session()->put('rmenus', $menus);
        if ($isAccess or $request->is("/")
         or $request->is("menuSubmit")
         or $request->is("menuSetupEdit/*")
         or $request->is("menuSetupEdits/*")
         or $request->is("departmentSubmit")
         or $request->is("departmentEdit/*")
         or $request->is("departmentEdits/*")
         or $request->is("designationSubmit")
         or $request->is("designationEdit/*")
         or $request->is("designationEdits/*")
         or $request->is("userSetup")
         or $request->is("userSubmit")
         or $request->is("userEdit/*")
         or $request->is("userEdits/*")
         or $request->is("getDesig/*")
         or $request->is("querySubmit")
         or $request->is("queryEdit/*")
         or $request->is("queryEdits/*")
         or $request->is("getinteractionHisotryList")
         or $request->is("addInteraction/*")
         or $request->is("addInteractions/*")
         or $request->is("deleteInt/*")
         or $request->is("createProjectAndCustomer")
         or $request->is("callCust/*")
         or $request->is("customerList")
         or $request->is("customerEdit/*")
         or $request->is("delete/*")
         or $request->is("acdc/*")

          ) {
            return $next($request);
        } else {
            return redirect('/noAccess');
        }
    }
}

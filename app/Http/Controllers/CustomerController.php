<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('admin.customer');
    }
    public function customerList(Request $request){
        $srch = $request->input('srch', '');
        $custs = Customer::query();

        if ($srch != "") {
            $custs->where(function ($query) use ($srch) {
                $query->where('custId', 'Like', '%' . $srch . '%')
                    ->orWhere('custName', 'Like', '%' . $srch . '%')
                    ->orWhere('custNumber', 'Like', '%' . $srch . '%')
                    ->orWhere('custKycDtl', 'Like', '%' . $srch . '%')
                    ->orWhere('custKycNo', 'Like', '%' . $srch . '%')
                    ->orWhere('custAdress', 'Like', '%' . $srch . '%')
                    ->orWhere('custCompany', 'Like', '%' . $srch . '%');
            });
        }
        $custs->where('id', '>', 0);
        $custs->OrderBy('id', 'DESC');
        $results = $custs->get();


        return view('admin.getCustoemrList', ['custs' => $results]);
    }
    public function customerEdit($id){
        $id=base64_decode($id);
        $custs = Customer::where('custId','=',$id)->first();
        return view('admin.customerEdit', ['custs' => $custs]);
    }
}

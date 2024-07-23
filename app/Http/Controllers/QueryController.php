<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index()
    {
        $qry = Query::where('stat','=','0')->orderBy('id','DESC')->take(10)->get();
        $csts = Customer::where('stat', '=', '0')->get();
        $data=compact('qry','csts');
        return view('admin.query')->with($data);
    }
    public function querySubmit(Request $request)
    {
        $request->validate([
            'source' => 'required',
            'consultant' => 'required',
            'custNm' => 'required',
            'custNo' => 'required',
            'dt' => 'required',
            'projectTyp' => 'required',
            'projectDtls' => 'required',
            'cost' => 'required'
        ]);
       // return  $request;
        date_default_timezone_set('Asia/Kolkata');

        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $lastSl=Query::orderBy('id', 'desc')->first();
        $lSl="";
        if($lastSl==""){
            $lSl=00;
        }else{
            $lSl=$lastSl->id;
        }

        $qry = new Query();

        $qry->qryid = 'ONSQ'.date('ymd').$lSl;
        $qry->source = $request->input('source');
        $qry->consultant = $request->input('consultant');
        $qry->exstCust = $request->input('exstCust');
        $qry->custId = $request->input('custId');
        $qry->custNm = $request->input('custNm');
        $qry->custNo = $request->input('custNo');
        $qry->dt = $request->input('dt');
        $qry->projectTyp = $request->input('projectTyp');
        $qry->projectDtls = $request->input('projectDtls');
        $qry->cost = $request->input('cost');
        $qry->edt = $edt;
        $qry->edtm = $edtm;
        $qry->eby = session()->get('username');
        $qry->save();
        session()->flash('alert', 'Query Create Succesfully');
        session()->flash('color', 'success');
        return redirect('query');
    }
    public function queryEdit($id)
    {
        $ids = base64_decode($id);
        $qrys = Query::find($ids);
        return view('admin.queryEdit', ['qry' => $qrys]);
    }
    public function queryEdits(Request $request, $id)
    {
        $request->validate([
            'source' => 'required',
            'consultant' => 'required',
            'custNm' => 'required',
            'custNo' => 'required',
            'dt' => 'required',
            'projectTyp' => 'required',
            'projectDtls' => 'required',
            'cost' => 'required'
        ]);
        $udt = date('Y-m-d');
        $udtm = date('Y-m-d H:i:s A');
        $qry = Query::where('id', $id)->first();
        $qry->source = $request->input('source');
        $qry->consultant = $request->input('consultant');
        $qry->custNm = $request->input('custNm');
        $qry->custNo = $request->input('custNo');
        $qry->dt = $request->input('dt');
        $qry->projectTyp = $request->input('projectTyp');
        $qry->projectDtls = $request->input('projectDtls');
        $qry->cost = $request->input('cost');
        $qry->udt = $udt;
        $qry->udtm = $udtm;
        $qry->uby = session()->get('username');
        $qry->update();
        session()->flash('alert2', 'Query Updated Succesfully');
        session()->flash('color2', 'success');
        return redirect('query');
    }

}

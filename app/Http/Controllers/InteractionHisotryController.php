<?php

namespace App\Http\Controllers;

use App\Models\Query;
use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionHisotryController extends Controller
{
    public function index()
    {
        return view('admin.interactionHisotry');
    }
    public function getinteractionHisotryList(Request $request)
    {
        $srch = $request->input('srch', '');
        $fdt = $request->input('fdt', '');
        $tdt = $request->input('tdt', '');
        $qry = Query::query();

        if ($srch != "") {
            $qry->where(function ($query) use ($srch) {
                $query->where('consultant', 'Like', '%' . $srch . '%')
                    ->orWhere('custNm', 'Like', '%' . $srch . '%')
                    ->orWhere('custNo', 'Like', '%' . $srch . '%')
                    ->orWhere('qryid', 'Like', '%' . $srch . '%')
                    ->orWhere('source', 'Like', '%' . $srch . '%');
            });
        }
        if ($fdt != "" && $tdt != "") {
            $qry->whereBetween('dt', [$fdt, $tdt]);
        } else {
            if ($fdt != "") {
                $qry->whereDate('dt', '>=', $fdt);
            }
            if ($tdt != "") {
                $qry->whereDate('dt', '<=', $tdt);
            }
        }
        $qry->where('id', '>', 0);
        $qry->OrderBy('id', 'DESC');
        $results = $qry->get();


        return view('admin.getinteractionHisotryList', ['qry' => $results]);
    }
    public function addInteraction($qid)
    {
        $qids = base64_decode($qid);
        $qry = Query::where('qryid', $qids)->first();
        $ints = Interaction::where('qryid', $qids)->get();
        $data = compact('qry', 'ints');
        return view('admin.addInteraction')->with($data);
    }
    public function addInteractions(Request $request, $qid)
    {
        $request->validate([
            'consultant' => 'required',
            'dt' => 'required',
            'projectDtls' => 'required',
            'projectNote' => 'required',
            'cost' => 'required'
        ]);


        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $interaction = new Interaction();
        $interaction->qryid = $qid;
        $interaction->consultant = $request->input('consultant');
        $interaction->dt = $request->input('dt');
        $interaction->projectDtls = $request->input('projectDtls');
        $interaction->projectNote = $request->input('projectNote');
        $interaction->cost = $request->input('cost');
        $interaction->udt = $edt;
        $interaction->udtm = $edtm;
        $interaction->uby = session()->get('username');
        $interaction->Save();

        session()->flash('alert', 'Interaction Added Succesfully');
        session()->flash('color', 'success');
        $qids = base64_encode($qid);
        return redirect('addInteraction/' . $qids);
    }
    public function deleteInt($id)
    {
        $qids = base64_encode($id);
        $ints = Interaction::where('qryid', $id)->first();
        $ints->delete();
        session()->flash('alert2', 'Interaction deleted succesfully');
        session()->flash('color2', 'danger');
        return redirect('addInteraction/' . $qids);
    }
    public function createProjectAndCustomer(Request $request)
    {
        $qryId = $request->input('qryId', '');
        $qry = Query::where('qryid', $qryId)->first();
        $edt = date('Y-m-d');
        $edtm = date('Y-m-d H:i:s A');
        $udt = date('Y-m-d');
        $udtm = date('Y-m-d H:i:s A');
        $lastSl = Customer::orderBy('id', 'desc')->first();
        $lSl = $lastSl->id;
        $cust = new Customer();
        $custId = 'ONSC' . date('ymd') . $lSl;
        $cust->custId = $custId;
        $cust->custName = $qry->custNm;
        $cust->custNumber = $qry->custNo;
        $cust->edt = $edt;
        $cust->edtm = $edtm;
        $cust->eby = session()->get('username');
        $cust->save();
        $qry = Query::where('qryid', $qryId)->first();
        $qry->stat = '1';
        $qry->udt = $udt;
        $qry->udtm = $udtm;
        $qry->uby = session()->get('username');
        $qry->update();
        echo "helo";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inventory;
use App\Supplier;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Session;

class InvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['inventory'] = inventory::all();
        return view('inventory.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('inventory.form')->with('supplier',$supplier);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data input
        $dName = $request->input('drug_name');
        $dLow = $request->input('drug_lowlimit');
        $dType = $request->input('drug_type');
        $dRemarks = $request->input('drug_remarks');
        $dPreCau = $request->input('drug_precaution');
        $dDPur = $request->input('dateOfPurchase');
        $dDExp = $request->input('dateOfExpiry');
        $dSupp = $request->input('drug_supplier');
        $dInt = $request->input('intakeTime');
        $dFreq = $request->input('frequency');
        $dSpu = $request->input('spu');
        $dUnitHnd = $request->input('unitsOnHand');

        // $d_data = Supplier::find($dSupp);
        // $supp_id = $d_data->id;

        $inventory = new Inventory;
        $inventory->drug_name = $dName;
        $inventory->drug_lowlimit = $dLow;
        $inventory->drug_type = $dType;
        $inventory->drug_remarks = $dRemarks;
        $inventory->drug_precaution = $dPreCau;
        $inventory->dateOfPurchase = $dDPur;
        $inventory->dateOfExpiry = $dDExp;
        $inventory->drug_supplier = $dSupp;
        $inventory->intakeTime = $dInt;
        $inventory->frequency = $dFreq;
        $inventory->spu = $dSpu;
        $inventory->unitsOnHand = $dUnitHnd;
        $inventory->save();
        
        return redirect()->action('InvController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $inventory = Inventory::find($id);
        // return response()->json($inventory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['inventory'] = Inventory::find($id);
        $supplier = Supplier::all();
        return view('inventory.edit',$data)->with('supplier',$supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dName = $request->input('drug_name');
        $dLow = $request->input('drug_lowlimit');
        $dType = $request->input('drug_type');
        $dRemarks = $request->input('drug_remarks');
        $dPreCau = $request->input('drug_precaution');
        $dDPur = $request->input('dateOfPurchase');
        $dDExp = $request->input('dateOfExpiry');
        $dSupp = $request->input('drug_supplier');
        $dInt = $request->input('intakeTime');
        $dFreq = $request->input('frequency');
        $dSpu = $request->input('spu');
        $dUnitHnd = $request->input('unitsOnHand');


        $inventory = Inventory::find($id);
        $inventory->drug_name = $dName;
        $inventory->drug_lowlimit = $dLow;
        $inventory->drug_type = $dType;
        $inventory->drug_remarks = $dRemarks;
        $inventory->drug_precaution = $dPreCau;
        $inventory->dateOfPurchase = $dDPur;
        $inventory->dateOfExpiry = $dDExp;
        $inventory->drug_supplier = $dSupp;
        $inventory->intakeTime = $dInt;
        $inventory->frequency = $dFreq;
        $inventory->spu = $dSpu;
        $inventory->unitsOnHand = $dUnitHnd;
        $inventory->save();
        
        return redirect()->action('InvController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        Session::flash('flash_message', 'Successfully deleted!');
        return redirect()->action('InvController@index');
    }
}

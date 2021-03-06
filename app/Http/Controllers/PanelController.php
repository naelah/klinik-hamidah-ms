<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Panel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Sesson;
use Alert;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['panel'] = panel::all();
        return view('panel.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = ['required' => 'This field MUST not be empty.',
                     'unique' => 'The data EXISTED already.',
        ];

        $rules = [
                    'p_company'=>'required|unique:panels',
                    'p_contactname'=>'required',
                    'p_telno'=>'required'
        ];

        $validation = Validator::make($request->all(),$rules,$messages);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput($request->all());
        }

        $panel = new Panel;
        $panel->p_company = $request->input('p_company');
        $panel->p_contactname = $request->input('p_contactname');
        $panel->p_telno =  $request->input('p_telno');
        $panel->p_ext = $request->input('p_ext');
        $panel->p_fax = $request->input('p_fax');
        $panel->p_email = $request->input('p_email');
        $panel->p_address = $request->input('p_address');
        $panel->p_city = $request->input('p_city');
        $panel->p_postcode = $request->input('p_postcode');
        $panel->p_state = $request->input('p_state');
        $panel->save();

        Alert::success('Successfull added!')->persistent("Close")->autoclose(3000);
        return redirect()->action('PanelController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['panel'] = Panel::find($id);
        return view('panel.edit',$data);
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
        $messages = ['required' => 'This field MUST not be empty.',
                     'unique' => 'The data EXISTED already.',
        ];

        $rules = [
                    'p_company'=>'required|unique:panels',
                    'p_contactname'=>'required',
                    'p_telno'=>'required'
        ];

        $validation = Validator::make($request->all(),$rules,$messages);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput($request->all());
        }

        $pCode = $request->input('p_code');
        $pComp = $request->input('p_company');
        $pConPer = $request->input('p_contactname');
        $pTel = $request->input('p_telno');
        $pExt = $request->input('p_ext');
        $pFax = $request->input('p_fax');
        $pEmail = $request->input('p_email');
        $pAddr = $request->input('p_address');
        $pCity = $request->input('p_city');
        $pPost = $request->input('p_postcode');
        $pStat = $request->input('p_state');

        $panel = Panel::find($id);
        $panel->p_code = $pCode;
        $panel->p_company = $pComp;
        $panel->p_contactname = $pConPer;
        $panel->p_telno =  $pTel;
        $panel->p_ext = $pExt;
        $panel->p_fax = $pFax;
        $panel->p_email = $pEmail;
        $panel->p_address = $pAddr;
        $panel->p_city = $pCity;
        $panel->p_postcode = $pPost;
        $panel->p_state = $pStat;
        $panel->save();

        Alert::success('Save!')->persistent("Close")->autoclose(3000);
        return redirect()->action('PanelController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $panel = Panel::find($id);
        $panel->delete();
        //Session::flash('flash_message', 'Successfully deleted!');
        return redirect()->action('PanelController@index');
    }
}

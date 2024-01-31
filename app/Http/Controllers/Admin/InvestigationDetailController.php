<?php

namespace App\Http\Controllers\Admin;

use App\InvestigationDetail;
use App\Http\Requests\MassDestroyInvestigationDetailRequest;
use App\Http\Requests\StoreInvestigationDetailRequest;
use App\Http\Requests\UpdateInvestigationDetailRequest;
use Gate;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class InvestigationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('investigation_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authId = auth()->user()->id;

        $investigationDetails = InvestigationDetail::all();

        $correctives =  InvestigationDetail::where('precortive_id', 1)->where('pic_id',$authId)->get();
        
        $preventives =  InvestigationDetail::where('precortive_id', 2)->where('pic_id',$authId)->get();

        return view('admin.investigationDetails.index', compact('investigationDetails','correctives','preventives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('investigation_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pics = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.investigationDetails.create',compact('pics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvestigationDetailRequest $request)
    {
        $data = $request->all();
        $data['status'] = 'Open';
        $investigationDetail = InvestigationDetail::create($data);

        return redirect()->route('admin.investigation-details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(InvestigationDetail $investigationDetail)
    {
        abort_if(Gate::denies('investigation_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $investigationDetail->load('picInvestigation', 'precortives');

        return view('admin.investigationDetails.show', compact('investigationDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InvestigationDetail $investigationDetail)
    {
        abort_if(Gate::denies('investigation_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pics = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $investigationDetail->load('picInvestigation','precortives');

        return view('admin.investigationDetails.edit', compact('investigationDetail','pics'));
    }

    /** 
     *2w3
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvestigationDetailRequest $request, InvestigationDetail $investigationDetail)
    {
        $data  = $request->all();
        
        unset($data['date_deadline']);
        $investigationDetail->update($data);

        

        return redirect()->route('admin.investigation-details.index');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvestigationDetail $investigationDetail)
    {
        abort_if(Gate::denies('investigation_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $investigationDetail->delete();

        return back();
    }
    
    public function massDestroy(MassDestroyInvestigationDetailRequest $request)
    {
        InvestigationDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function actionByExecutor(InvestigationDetail $investigationDetail) {
        $investigationDetail->status = "Close";
        
        $investigationDetail->update();

        return redirect()->route('admin.investigation-details.index');
    }
}

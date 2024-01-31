<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MassDestroyRegionIncidentRequest;
use App\Http\Requests\StoreRegionIncidentRequest;
use App\Http\Requests\UpdateRegionIncidentRequest;
use App\RegionIncident;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegionIncidentController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('region_incident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionIncidents = RegionIncident::all();

        return view('admin.regionIncidents.index', compact('regionIncidents'));
    }

    public function create()
    {
        abort_if(Gate::denies('region_incident_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionIncidents.create');
    }

    public function store(StoreRegionIncidentRequest $request)
    {
        $regionIncident = RegionIncident::create($request->all());

        return redirect()->route('admin.region-incidents.index');
    }

    public function edit(RegionIncident $regionIncident)
    {
        abort_if(Gate::denies('region_incident_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionIncidents.edit', compact('regionIncident'));
    }

    public function update(UpdateRegionIncidentRequest $request, RegionIncident $regionIncident)
    {
        $regionIncident->update($request->all());

        return redirect()->route('admin.region-incidents.index');
    }

    public function show(RegionIncident $regionIncident)
    {
        abort_if(Gate::denies('region_incident_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionIncident->load('regionIncidentReports');

        return view('admin.regionIncidents.show', compact('regionIncident'));
    }

    public function destroy(RegionIncident $regionIncident)
    {
        abort_if(Gate::denies('region_incident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionIncident->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegionIncidentRequest $request)
    {
        RegionIncident::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}

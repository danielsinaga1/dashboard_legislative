<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAreaIncidentRequest;
use App\Http\Requests\StoreAreaIncidentRequest;
use App\Http\Requests\UpdateAreaIncidentRequest;
use App\AreaIncident;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;


class AreaIncidentController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('area_incident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areaIncidents = AreaIncident::all();

        return view('admin.areaIncidents.index', compact('areaIncidents'));
    }

    public function create()
    {
        abort_if(Gate::denies('area_incident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.areaIncidents.create');
    }

    public function store(StoreAreaIncidentRequest $request)
    {
        $areaIncident = AreaIncident::create($request->all());

        return redirect()->route('admin.area-incidents.index');
    }

    public function edit(AreaIncident $areaIncident)
    {
        abort_if(Gate::denies('area_incident_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.areaIncidents.edit', compact('areaIncident'));
    }

    public function update(UpdateAreaIncidentRequest $request, AreaIncident $areaIncident)
    {
        $areaIncident->update($request->all());

        return redirect()->route('admin.area-incidents.index');
    }

    public function show(AreaIncident $areaIncident)
    {
        abort_if(Gate::denies('area_incident_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areaIncident->load('locationIncidentReports');

        return view('admin.areaIncidents.show', compact('areaIncident'));
    }

    public function destroy(AreaIncident $areaIncident)
    {
        abort_if(Gate::denies('area_incident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areaIncident->delete();

        return back();
    }

    public function massDestroy(MassDestroyAreaIncidentRequest $request)
    {
        AreaIncident::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}

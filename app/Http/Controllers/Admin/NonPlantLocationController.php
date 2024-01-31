<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Location;
use App\NonPlantLocation;
use App\RegionNcr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NonPlantLocationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nonplant_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonPlantLocations = NonPlantLocation::all();

        return view('admin.nonPlantlocations.index', compact('nonPlantLocations'));
    }

    public function create(NonPlantLocation $nonPlantLocation)
    {
        abort_if(Gate::denies('nonplant_location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $region_ncrs = RegionNcr::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nonPlantLocations.create', compact('nonPlantLocation'));
    }

    public function store(Request $request)
    {
        $nonPlantLocation = NonPlantLocation::create($request->all());

        return redirect()->route('admin.nonplant-locations.index');
    }

    public function edit(NonPlantLocation $nonPlantLocation)
    {
        abort_if(Gate::denies('nonplant_location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region_ncrs = RegionNcr::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nonPlantLocation.edit', compact('nonPlantLocation'));
    }

    public function update(Request $request, NonPlantLocation $nonPlantLocation)
    {
        $nonPlantLocation->update($request->all());

        return redirect()->route('admin.nonplant-locations.index');
    }

    public function show(NonPlantLocation $nonPlantLocation)
    {
        abort_if(Gate::denies('nonplant_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $location->load('resultIncidentReports');

        return view('admin.nonPlantLocations.show', compact('nonPlantLocation'));
    }

    public function destroy(NonPlantLocation $nonPlantLocation)
    {
        abort_if(Gate::denies('nonplant_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonPlantLocation->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Location::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

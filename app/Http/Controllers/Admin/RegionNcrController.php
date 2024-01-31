<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegionNcr;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RegionNcrController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('region_ncr_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionNcrs = RegionNcr::all();

        return view('admin.regionNcrs.index', compact('regionNcrs'));
    }

    public function create()
    {
        abort_if(Gate::denies('region_ncr_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionNcrs.create');
    }

    public function store(Request $request)
    {
        $regionNcr = RegionNcr::create($request->all());

        return redirect()->route('admin.region-ncrs.index');
    }

    public function edit(RegionNcr $regionNcr)
    {
        abort_if(Gate::denies('region_ncr_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionNcrs.edit', compact('regionNcr'));
    }

    public function update(Request $request, RegionNcr $regionNcr)
    {
        $regionNcr->update($request->all());

        return redirect()->route('admin.region-ncrs.index');
    }

    public function show(RegionNcr $regionNcr)
    {
        abort_if(Gate::denies('region_ncr_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionNcr->load('regionNonConformityReports');

        return view('admin.regionNcrs.show', compact('regionNcr'));
    }

    public function destroy(RegionNcr $regionNcr)
    {
        abort_if(Gate::denies('region_ncr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionNcr->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        RegionNcr::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

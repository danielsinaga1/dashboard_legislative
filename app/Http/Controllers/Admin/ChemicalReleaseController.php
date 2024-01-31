<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChemicalReleaseRequest;
use App\Http\Requests\StoreChemicalReleaseRequest;
use App\Http\Requests\UpdateChemicalReleaseRequest;
use App\ChemicalRelease;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChemicalReleaseController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('chemical_release_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chemicalReleases = ChemicalRelease::all();

        return view('admin.chemicalReleases.index', compact('chemicalReleases'));
    }

    public function create()
    {
        abort_if(Gate::denies('chemical_release_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chemicalReleases.create');
    }

    public function store(StoreChemicalReleaseRequest $request)
    {
        $chemicalRelease = ChemicalRelease::create($request->all());

        return redirect()->route('admin.chemical-releases.index');
    }

    public function edit(ChemicalRelease $chemicalRelease)
    {
        abort_if(Gate::denies('chemical_release_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chemicalReleases.edit', compact('chemicalRelease'));
    }

    public function update(UpdateChemicalReleaseRequest $request, ChemicalRelease $chemicalRelease)
    {
        $chemicalRelease->update($request->all());

        return redirect()->route('admin.chemical-releases.index');
    }

    public function show(ChemicalRelease $chemicalRelease)
    {
        abort_if(Gate::denies('chemical_release_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chemicalRelease->load('chemicalRealeaseIncidentReports');

        return view('admin.chemicalReleases.show', compact('chemicalRelease'));
    }

    public function destroy(ChemicalRelease $chemicalRelease)
    {
        abort_if(Gate::denies('chemical_release_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chemicalRelease->delete();

        return back();
    }

    public function massDestroy(MassDestroyChemicalReleaseRequest $request)
    {
        ChemicalRelease::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}

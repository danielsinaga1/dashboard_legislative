<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyPrecortiveRequest;
use App\Http\Requests\StorePrecortiveRequest;
use App\Http\Requests\UpdatePrecortiveRequest;
use App\Http\Controllers\Controller;
use App\Precortive;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PrecortiveController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('precortive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $precortives = Precortive::all();

        return view('admin.precortives.index', compact('precortives'));
    }

    public function create()
    {
        abort_if(Gate::denies('precortive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.precortives.create');
    }

    public function store(StorePrecortiveRequest $request)
    {
        $precortive = Precortive::create($request->all());

        return redirect()->route('admin.precortives.index');
    }

    public function edit(Precortive $precortive)
    {
        abort_if(Gate::denies('precortive_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.precortives.edit', compact('precortive'));
    }

    public function update(UpdatePrecortiveRequest $request, Precortive $precortive)
    {
        $precortive->update($request->all());

        return redirect()->route('admin.precortives.index');
    }

    public function show(Precortive $precortive)
    {
        abort_if(Gate::denies('precortive_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chemicalRelease->load('chemicalRealeaseIncidentReports');

        return view('admin.precortives.show', compact('precortive'));
    }

    public function destroy(Precortive $precortive)
    {
        abort_if(Gate::denies('precortive_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $precortive->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrecortiveRequest $request)
    {
        Precortive::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

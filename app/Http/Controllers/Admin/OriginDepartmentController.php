<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOriginDepartmentRequest;
use App\Http\Requests\StoreOriginDepartmentRequest;
use App\Http\Requests\UpdateOriginDepartmentRequest;
use App\OriginDepartment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OriginDepartmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('origin_department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $originDepartments = OriginDepartment::all();

        return view('admin.originDepartments.index', compact('originDepartments'));
    }

    public function create()
    {
        abort_if(Gate::denies('origin_department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.originDepartments.create');
    }

    public function store(StoreOriginDepartmentRequest $request)
    {
        $originDepartment = OriginDepartment::create($request->all());

        return redirect()->route('admin.origin-departments.index');
    }

    public function edit(OriginDepartment $originDepartment)
    {
        abort_if(Gate::denies('origin_department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.originDepartments.edit', compact('originDepartment'));
    }

    public function update(UpdateOriginDepartmentRequest $request, OriginDepartment $originDepartment)
    {
        $originDepartment->update($request->all());

        return redirect()->route('admin.origin-departments.index');
    }

    public function show(OriginDepartment $originDepartment)
    {
        abort_if(Gate::denies('origin_department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $originDepartment->load('deptOriginIncidentReports', 'deptUsers');

        return view('admin.originDepartments.show', compact('originDepartment'));
    }

    public function destroy(OriginDepartment $originDepartment)
    {
        abort_if(Gate::denies('origin_department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $originDepartment->delete();

        return back();
    }

    public function massDestroy(MassDestroyOriginDepartmentRequest $request)
    {
        OriginDepartment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

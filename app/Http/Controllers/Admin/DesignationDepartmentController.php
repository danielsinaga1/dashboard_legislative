<?php

namespace App\Http\Controllers\Admin;

use App\DesignationDepartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDesignationDepartmentRequest;
use App\Http\Requests\StoreDesignationDepartmentRequest;
use App\Http\Requests\UpdateDesignationDepartmentRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignationDepartmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('designation_department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationDepartments = DesignationDepartment::all();

        return view('admin.designationDepartments.index', compact('designationDepartments'));
    }

    public function create()
    {
        abort_if(Gate::denies('designation_department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.designationDepartments.create');
    }

    public function store(StoreDesignationDepartmentRequest $request)
    {
        $designationDepartment = DesignationDepartment::create($request->all());

        return redirect()->route('admin.designation-departments.index');
    }

    public function edit(DesignationDepartment $designationDepartment)
    {
        abort_if(Gate::denies('designation_department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.designationDepartments.edit', compact('designationDepartment'));
    }

    public function update(UpdateDesignationDepartmentRequest $request, DesignationDepartment $designationDepartment)
    {
        $designationDepartment->update($request->all());

        return redirect()->route('admin.designation-departments.index');
    }

    public function show(DesignationDepartment $designationDepartment)
    {
        abort_if(Gate::denies('designation_department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationDepartment->load('deptDesignatedIncidentReports');

        return view('admin.designationDepartments.show', compact('designationDepartment'));
    }

    public function destroy(DesignationDepartment $designationDepartment)
    {
        abort_if(Gate::denies('designation_department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationDepartment->delete();

        return back();
    }

    public function massDestroy(MassDestroyDesignationDepartmentRequest $request)
    {
        DesignationDepartment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

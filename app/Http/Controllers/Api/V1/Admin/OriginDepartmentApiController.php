<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOriginDepartmentRequest;
use App\Http\Requests\UpdateOriginDepartmentRequest;
use App\Http\Resources\Admin\OriginDepartmentResource;
use App\OriginDepartment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OriginDepartmentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('origin_department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OriginDepartmentResource(OriginDepartment::all());
    }

    public function store(StoreOriginDepartmentRequest $request)
    {
        $originDepartment = OriginDepartment::create($request->all());

        return (new OriginDepartmentResource($originDepartment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OriginDepartment $originDepartment)
    {
        abort_if(Gate::denies('origin_department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OriginDepartmentResource($originDepartment);
    }

    public function update(UpdateOriginDepartmentRequest $request, OriginDepartment $originDepartment)
    {
        $originDepartment->update($request->all());

        return (new OriginDepartmentResource($originDepartment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OriginDepartment $originDepartment)
    {
        abort_if(Gate::denies('origin_department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $originDepartment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

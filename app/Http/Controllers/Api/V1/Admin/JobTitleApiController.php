<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobTitleRequest;
use App\Http\Requests\UpdateJobTitleRequest;
use App\Http\Resources\Admin\JobTitleResource;
use App\JobTitle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobTitleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_title_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobTitleResource(JobTitle::all());
    }

    public function store(StoreJobTitleRequest $request)
    {
        $jobTitle = JobTitle::create($request->all());

        return (new JobTitleResource($jobTitle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JobTitle $jobTitle)
    {
        abort_if(Gate::denies('job_title_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobTitleResource($jobTitle);
    }

    public function update(UpdateJobTitleRequest $request, JobTitle $jobTitle)
    {
        $jobTitle->update($request->all());

        return (new JobTitleResource($jobTitle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JobTitle $jobTitle)
    {
        abort_if(Gate::denies('job_title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobTitle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

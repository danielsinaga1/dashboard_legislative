<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobTitleRequest;
use App\Http\Requests\StoreJobTitleRequest;
use App\Http\Requests\UpdateJobTitleRequest;
use App\JobTitle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobTitleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_title_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobTitles = JobTitle::all();

        return view('admin.jobTitles.index', compact('jobTitles'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_title_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobTitles.create');
    }

    public function store(StoreJobTitleRequest $request)
    {
        $jobTitle = JobTitle::create($request->all());

        return redirect()->route('admin.job-titles.index');
    }

    public function edit(JobTitle $jobTitle)
    {
        abort_if(Gate::denies('job_title_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobTitles.edit', compact('jobTitle'));
    }

    public function update(UpdateJobTitleRequest $request, JobTitle $jobTitle)
    {
        $jobTitle->update($request->all());

        return redirect()->route('admin.job-titles.index');
    }

    public function show(JobTitle $jobTitle)
    {
        abort_if(Gate::denies('job_title_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobTitle->load('jobUsers');

        return view('admin.jobTitles.show', compact('jobTitle'));
    }

    public function destroy(JobTitle $jobTitle)
    {
        abort_if(Gate::denies('job_title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobTitle->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobTitleRequest $request)
    {
        JobTitle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

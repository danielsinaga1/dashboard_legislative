<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\JobTitle;
use App\OriginDepartment;
use App\UserParent;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $jobs = JobTitle::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depts = OriginDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles', 'jobs', 'depts','parents'));
    }

    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        $user = User::create($request->all());

        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $jobs = JobTitle::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depts = OriginDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'job', 'dept','parent');

        return view('admin.users.edit', compact('roles', 'jobs', 'depts', 'user','parents'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'job', 'dept', 'namaPelaporIncidentReports', 'reviewedByIncidentReports', 'acknowledgedByIncidentReports', 'actionByIncidentReports', 'assignedToAssets', 'assignedUserAssetsHistories', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

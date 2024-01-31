<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\User;
use App\AreaIncident;
use App\AreaUser;

use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyAreaUserRequest;
use App\Http\Requests\StoreAreaUserRequest;
use App\Http\Requests\UpdateAreaUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AreaUserController extends Controller
{


    public function index()
    {
        abort_if(Gate::denies('area_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areaUsers = AreaUser::all();

        return view('admin.areaUsers.index', compact('areaUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('area_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.areaUsers.create',                                                                                      );
    }

    public function store(StoreAreaUserRequest $request)
    {
        $areaUser = AreaUser::create($request->all());

        return redirect()->route('admin.area-users.index');
    }

    public function edit(AreaUser $areaUser)
    {
        abort_if(Gate::denies('area_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areaUser->load('user', 'area');

        return view('admin.areaUsers.edit', compact('areaUser','users','area_incidents'));
    }

    public function update(UpdateAreaUserRequest $request, AreaUser $areaUser)
    {
        $areaUser->update($request->all());

        return redirect()->route('admin.area-users.index');
    }

    public function show(AreaUser $areaUser)
    {
        abort_if(Gate::denies('area_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areaUser->load('user', 'area');

        return view('admin.areaUsers.show', compact('areaUser'));
    }

    public function destroy(AreaUser $areaUser)
    {
        abort_if(Gate::denies('area_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areaUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyAreaUserRequest $request)
    {
        AreaUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MassDestroyUserParentRequest;
use App\Http\Requests\StoreUserParentRequest;
use App\Http\Requests\UpdateUserParentRequest;
use App\User;
use App\UserParent;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserParentController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('user_parent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userParents = UserParent::all();

        return view('admin.userParents.index', compact('userParents'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_parent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userParents.create');
    }

    public function store(StoreUserParentRequest $request)
    {
        $userParents = UserParent::create($request->all());

        return redirect()->route('admin.user-parents.index');
    }

    public function edit(UserParent $userParent)
    {
        abort_if(Gate::denies('user_parent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userParents.edit');
    }

    public function update(UpdateUserParentRequest $request, UserParent $userParent)
    {
        $userParent->update($request->all());

        return redirect()->route('admin.user-parents.index');
    }

    public function show(UserParent $userParent)
    {
        abort_if(Gate::denies('user_parent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $result->load('resultIncidentReports');

        return view('admin.userParents.show');
    }

    public function destroy(UserParent $userParent)
    {
        abort_if(Gate::denies('user_parent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userParent->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserParentRequest $request)
    {
        UserParent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}

@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.originDepartment.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.origin-departments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.originDepartment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $originDepartment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.originDepartment.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $originDepartment->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.originDepartment.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $originDepartment->code }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.origin-departments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#dept_origin_incident_reports" aria-controls="dept_origin_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#dept_users" aria-controls="dept_users" role="tab" data-toggle="tab">
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="dept_origin_incident_reports">
                        @includeIf('admin.originDepartments.relationships.deptOriginIncidentReports', ['incidentReports' => $originDepartment->deptOriginIncidentReports])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="dept_users">
                        @includeIf('admin.originDepartments.relationships.deptUsers', ['users' => $originDepartment->deptUsers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
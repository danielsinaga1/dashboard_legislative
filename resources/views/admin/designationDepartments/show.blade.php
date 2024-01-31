@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.designationDepartment.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.designation-departments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designationDepartment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $designationDepartment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designationDepartment.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $designationDepartment->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.designationDepartment.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $designationDepartment->code }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.designation-departments.index') }}">
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
                        <a href="#dept_designated_incident_reports" aria-controls="dept_designated_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="dept_designated_incident_reports">
                        @includeIf('admin.designationDepartments.relationships.deptDesignatedIncidentReports', ['incidentReports' => $designationDepartment->deptDesignatedIncidentReports])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
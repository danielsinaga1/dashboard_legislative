@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.basicCause.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.root-causes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.basicCause.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $rootCause->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.basicCause.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $rootCause->name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.root-causes.index') }}">
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
                        <a href="#root_cause_incident_reports" aria-controls="root_cause_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.basicCause.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="root_cause_incident_reports">
                        @includeIf('admin.rootCauses.relationships.rootCauseIncidentReports', ['incidentReports' => $rootCause->rootCauseIncidentReports])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
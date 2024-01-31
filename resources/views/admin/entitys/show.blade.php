@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.show') }} {{ trans('cruds.entity.title') }}
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.entitys.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.entity.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $entity->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.entity.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $entity->name }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.entitys.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.relatedData') }}
                    </div>
                    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                        <li role="presentation">
                            <a href="#result_incident_reports" aria-controls="result_incident_reports" role="tab"
                                data-toggle="tab">
                                {{ trans('cruds.incidentReport.title') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" role="tabpanel" id="result_incident_reports">
                            @includeIf('admin.results.relationships.resultIncidentReports', [
                                'incidentReports' => $result->resultIncidentReports,
                            ])
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection
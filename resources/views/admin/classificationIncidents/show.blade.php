@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.classificationIncident.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.classification-incidents.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.classificationIncident.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $classificationIncident->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.classificationIncident.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $classificationIncident->name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.classification-incidents.index') }}">
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
                        <a href="#classify_incident_reports" aria-controls="classify_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#classification_classification_details" aria-controls="classification_classification_details" role="tab" data-toggle="tab">
                            {{ trans('cruds.classificationDetail.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="classify_incident_reports">
                        @includeIf('admin.classificationIncidents.relationships.classifyIncidentReports', ['incidentReports' => $classificationIncident->classifyIncidentReports])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="classification_classification_details">
                        @includeIf('admin.classificationIncidents.relationships.classificationClassificationDetails', ['classificationDetails' => $classificationIncident->classificationClassificationDetails])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
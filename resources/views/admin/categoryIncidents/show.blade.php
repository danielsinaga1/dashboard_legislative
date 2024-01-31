@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.categoryIncident.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.category-incidents.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.categoryIncident.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $categoryIncident->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.categoryIncident.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $categoryIncident->name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.category-incidents.index') }}">
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
                        <a href="#category_classification_details" aria-controls="category_classification_details" role="tab" data-toggle="tab">
                            {{ trans('cruds.classificationDetail.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#category_incident_reports" aria-controls="category_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="category_classification_details">
                        @includeIf('admin.categoryIncidents.relationships.categoryClassificationDetails', ['classificationDetails' => $categoryIncident->categoryClassificationDetails])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="category_incident_reports">
                        @includeIf('admin.categoryIncidents.relationships.categoryIncidentReports', ['incidentReports' => $categoryIncident->categoryIncidentReports])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
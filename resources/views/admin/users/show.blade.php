@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.npk') }}
                                    </th>
                                    <td>
                                        {{ $user->npk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <td>
                                        {{ $user->email_verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <td>
                                        @foreach($user->roles as $key => $roles)
                                            <span class="label label-info">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.job') }}
                                    </th>
                                    <td>
                                        {{ $user->job->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.dept') }}
                                    </th>
                                    <td>
                                        {{ $user->dept->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#nama_pelapor_incident_reports" aria-controls="nama_pelapor_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#reviewed_by_incident_reports" aria-controls="reviewed_by_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#acknowledged_by_incident_reports" aria-controls="acknowledged_by_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#action_by_incident_reports" aria-controls="action_by_incident_reports" role="tab" data-toggle="tab">
                            {{ trans('cruds.incidentReport.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#assigned_to_assets" aria-controls="assigned_to_assets" role="tab" data-toggle="tab">
                            {{ trans('cruds.asset.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#assigned_user_assets_histories" aria-controls="assigned_user_assets_histories" role="tab" data-toggle="tab">
                            {{ trans('cruds.assetsHistory.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#user_user_alerts" aria-controls="user_user_alerts" role="tab" data-toggle="tab">
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="nama_pelapor_incident_reports">
                        @includeIf('admin.users.relationships.namaPelaporIncidentReports', ['incidentReports' => $user->namaPelaporIncidentReports])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="reviewed_by_incident_reports">
                        @includeIf('admin.users.relationships.reviewedByIncidentReports', ['incidentReports' => $user->reviewedByIncidentReports])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="acknowledged_by_incident_reports">
                        @includeIf('admin.users.relationships.acknowledgedByIncidentReports', ['incidentReports' => $user->acknowledgedByIncidentReports])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="action_by_incident_reports">
                        @includeIf('admin.users.relationships.actionByIncidentReports', ['incidentReports' => $user->actionByIncidentReports])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="assigned_to_assets">
                        @includeIf('admin.users.relationships.assignedToAssets', ['assets' => $user->assignedToAssets])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="assigned_user_assets_histories">
                        @includeIf('admin.users.relationships.assignedUserAssetsHistories', ['assetsHistories' => $user->assignedUserAssetsHistories])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                        @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>
@endsection
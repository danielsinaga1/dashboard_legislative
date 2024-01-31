@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.historyTaskIncidentReport.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{-- <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.task-incident-reports.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div> --}}
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th colspan="2" style="text-align:center;background-color:#80ced6">Initiator</th>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.no_laporan') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->no_laporan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.date_incident') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->date_incident }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.nama_pelapor') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->nama_pelapor->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.dept_origin') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->dept_origin->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.taskIncidentReport.fields.basic_cause') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->root_cause->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->category->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.classify') }}
                                    </th>
                                    <td>
                                        @if($incidentReport->classify->id === 1)
                                        <span class="label" style="background-color: hsl(0, 7%, 5%);">
                                            {{ $incidentReport->classify->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->classify->id === 2)
                                        <span class="label" style="background-color: hsl(0, 0%, 3%);">
                                            {{ $incidentReport->classify->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->classify->id === 3)
                                        <span class="label" style="background-color: hsla(0, 96%, 46%, 0.966);">
                                            {{ $incidentReport->classify->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->classify->id === 4)
                                        <span class="label" style="background-color: hsl(0, 93%, 42%);">
                                            {{ $incidentReport->classify->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->classify->id === 5)
                                        <span class="label" style="background-color: hsl(0, 100%, 40%);">
                                            {{ $incidentReport->classify->name ?? '' }}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.area') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->area->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.location') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.chemical') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->chemical->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.photos') }}
                                    </th>
                                    <td>
                                        @foreach($incidentReport->photos as $key => $media)
                                        <a href="{{ $media->getFullUrl() }}" target="_blank">
                                            <img src="{{ $media->getFullUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.reviewed_by') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->reviewed_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.reviewed_time') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->reviewed_at ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.acknowledged_by') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->acknowledged_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.acknowledged_time') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->acknowledged_at ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align:center;background-color:#80ced6">Executor</th>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.dept_designated') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->dept_designated->name ?? '' }}
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.perbaikan') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->perbaikan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.pencegahan') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->pencegahan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.action_by') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->action_by->name ?? '' }}
                                    </td>
                                </tr>
                              
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.date_action') }}
                                    </th>
                                    <td>
                                        {{ $incidentReport->date_action }}
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.file_investigation') }}
                                    </th>
                                    <td>
                                        @foreach($incidentReport->file as $key => $media)
                                            <a href="{{ $media->getFullUrl() }}" target="_blank">
                                                <!-- {{ trans('global.view_file') }} -->
                                                <i class="fas fa-file"></i>
                                            </a>
                                        @endforeach
                                    </td>
                                   
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.result') }}
                                    </th>
                                    <td>
                                        @if($incidentReport->result->id === 4)
                                        <span class="label label-info">
                                            {{ $incidentReport->result->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 1)
                                        <span class="label label-warning">
                                            {{ $incidentReport->result->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 2)
                                        <span class="label label-success">
                                            {{ $incidentReport->result->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 3)
                                        <span class="label label-danger">
                                            {{ $incidentReport->result->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 5)
                                        <span class="label label-primary">
                                            {{ $incidentReport->result->name ?? '' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 6)
                                        <span class="label label-default">
                                            {{ $incidentReport->result->name ?? '' }}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.status') }}
                                    </th>
                                    <td>
                                        @if($incidentReport->status === 'Open')
                                        <span class="text-red">
                                            {{ $incidentReport->status ?? '' }}
                                        </span>
                                        @elseif($incidentReport->status === 'Close')
                                        <span class="text-green">
                                            {{ $incidentReport->status ?? '' }}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                               
                                
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.task-incident-reports.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>

                    </div>

                </div>
            </div>



        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Workflow Approval</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
    
                                <th>
                                    {{ trans('cruds.distributionIncident.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.distributionIncident.fields.result') }}
                                </th>
                                <th>
                                    {{ trans('cruds.distributionIncident.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.distributionIncident.fields.created_at') }}
                                </th>
    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($distribution_incidents as $key => $distribution_incident)
    
                            <tr data-entry-id="{{ $distribution_incident->id }}">
    
                                <td>
                                    {{ $distribution_incident->name_report->name ?? '-' }}
                                </td>
                                <td>
                                    @if($distribution_incident->result->id == 4)
                                    <span class="label label-info">
                                        {{ $distribution_incident->result->name ?? '-' }}
                                    </span>
                                    @elseif($distribution_incident->result->id == 1)
                                    <span class="label label-warning">
                                        {{ $distribution_incident->result->name ?? '-' }}
                                    </span>
                                    @elseif($distribution_incident->result->id == 2)
                                    <span class="label label-success">
                                        {{ $distribution_incident->result->name ?? '-' }}
                                    </span>
                                    @elseif($distribution_incident->result->id == 3)
                                    <span class="label label-danger">
                                        {{ $distribution_incident->result->name ?? '-' }}
                                    </span>
                                    @elseif($distribution_incident->result->id == 5)
                                    <span class="label label-primary">
                                        {{ $distribution_incident->result->name ?? '-' }}
                                    </span>
                                    @elseif($distribution_incident->result->id == 6)
                                    <span class="label label-default">
                                        {{ $distribution_incident->result->name ?? '-' }}
                                    </span>
                                    @endif
                                </td>
    
                                <td>
                                    <strong>{{ $distribution_incident->description ?? '-' }}
                                </td>
    
                                <td>
                                    @if (isset($distribution_incident->created_at))
                                    {{ \Carbon\Carbon::parse($distribution_incident->created_at)->format('d M Y H:i:s')    }}
                                    @else
                                    {{ '-' }}
                                    @endif
                                </td>
    
                            </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    
    </div>
    
</div>
@endsection
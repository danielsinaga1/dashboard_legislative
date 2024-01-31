@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.myIncidentReport.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{-- <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.my-incident-reports.index') }}">
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
                                    {{ trans('cruds.myIncidentReport.fields.no_laporan') }}
                                </th>
                                <td>
                                    {{ $incidentReport->no_laporan }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.date_incident') }}
                                </th>
                                <td>
                                    {{ $incidentReport->date_incident }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.nama_pelapor') }}
                                </th>
                                <td>
                                    {{ $incidentReport->nama_pelapor->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.dept_origin') }}
                                </th>
                                <td>
                                    {{ $incidentReport->dept_origin->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.basic_cause') }}
                                </th>
                                <td>
                                    {{ $incidentReport->root_cause->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.category') }}
                                </th>
                                <td>
                                    {{ $incidentReport->category->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.classify') }}
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
                                    {{ trans('cruds.myIncidentReport.fields.area') }}
                                </th>
                                <td>
                                    {{ $incidentReport->area->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.location') }}
                                </th>
                                <td>
                                    {{ $incidentReport->location }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.chemical') }}
                                </th>
                                <td>
                                    {{ $incidentReport->chemical->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.awal_perbaikan') }}
                                </th>
                                <td>
                                    {{ $incidentReport->perbaikan_awal ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.description') }}
                                </th>
                                <td>
                                    {{ $incidentReport->description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.photos') }}
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
                                    {{ trans('cruds.myIncidentReport.fields.file_initiator') }}
                                </th>
                                <td>
                                    @foreach($incidentReport->file_initiator as $key => $media)
                                    <a href="{{ $media->getFullUrl() }}" target="_blank">
                                        <!-- {{ trans('global.view_file') }} -->
                                        <i class="fas fa-file"></i>
                                    </a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.reviewed_by') }}
                                </th>
                                <td>
                                    {{ $incidentReport->reviewed_by->name ?? 'Waiting for Approval' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.reviewed_time') }}
                                </th>
                                <td>
                                    @if(isset($incidentReport->reviewed_at))
                                    {{ Carbon\Carbon::parse($incidentReport->reviewed_at)->format('d-M-Y H:i:s')}}
                                    @else
                                    {{ 'Waiting for Approval' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.acknowledged_by') }}
                                </th>
                                <td>
                                    {{ $incidentReport->acknowledged_by->name ?? 'Waiting for Approval' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.acknowledged_time') }}
                                </th>
                                <td>
                                    @if(isset($incidentReport->acknowledged_at))
                                    {{ Carbon\Carbon::parse($incidentReport->acknowledged_at)->format('d-M-Y H:i:s')}}
                                    @else
                                    {{ 'Waiting for Approval' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center;background-color:#80ced6">Executor</th>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.dept_designated') }}
                                </th>
                                <td>
                                    {{ $incidentReport->dept_designated->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.action_by') }}
                                </th>
                                <td>
                                    {{ $incidentReport->action_by->name ?? '-'}}
                                </td>
                            </tr>
                            
                            <tr>
                                <th>
                                    {{ trans('cruds.myIncidentReport.fields.result') }}
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
                                    {{ trans('cruds.myIncidentReport.fields.status') }}
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
                            <tr>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.reason') }}
                                    </th>
                                    <td>
                                            {{ $incidentReport->reason ?? '' }}
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    @if(auth()->user()->is_initiator)
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.my-incident-reports.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    @elseif(auth()->user()->is_superintendent)
                    @if($incidentReport->result_id !== 4)
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.my-incident-reports.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    @endif
                    @elseif(auth()->user()->is_manager)
                    @if($incidentReport->result_id !== 1)
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.my-incident-reports.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            @if (auth()->user()->is_superintendent || auth()->user()->is_administrator || auth()->user()->is_superadministrator)
            <div class="panel-footer">
                @if($incidentReport->reviewed_by_id !== auth()->user()->id && $incidentReport->result_id == 4)
                <a href="{{ route('admin.my-incident-reports.approveBySuperintendent' , $incidentReport->id) }}"
                    class="btn btn-success">Approve
                </a>

                <a href="#" class="btn btn-danger" data-toggle="modal" data-placement="top" title="Reason Modal"
                    data-target="#modalReject" data-original-title="Reason Modal" id="rejectBtn"
                    data-myreason="{{$incidentReport->reason}}">Reject
                </a>
                @include('partials.modals_my_incident_reports_rejected_spdt')
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                @endif
            </div>
            @endif

            @if (auth()->user()->is_manager && $incidentReport->result_id !== 3)
            <div class="panel-footer">
                @if($incidentReport->acknowledged_by_id !== auth()->user()->id)

                <a href="{{ route('admin.my-incident-reports.approveByManager' , $incidentReport->id) }}"
                    class="btn btn-success">Approve</a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-placement="top" title="Reason Modal"
                    data-target="#modalReject" data-original-title="Reason Modal" id="rejectBtn"
                    data-myreason="{{$incidentReport->reason}}">Reject
                </a>
                {{-- <a href="{{ route('admin.my-incident-reports.rejectByManager' , $incidentReport->id) }}"
                class="btn btn-danger" onclick="return confirm('Are you sure want to reject Incident
                Report?')">Reject</a> --}}
                @endif
                @include('partials.modals_my_incident_reports_rejected_mgr')
                @if($incidentReport->result_id !== 2 && $incidentReport->result_id !== 5)
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                @endif
            </div>
            @endif
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

{{-- @include('partials.modals_my_incident_reports_approval') --}}
@endsection

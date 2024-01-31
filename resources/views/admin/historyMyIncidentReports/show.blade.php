@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.historyMyIncidentReport.title') }}
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
                                    {{ trans('cruds.historyMyIncidentReport.fields.no_laporan') }}
                                </th>
                                <td>
                                    {{ $incidentReport->no_laporan }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.date_incident') }}
                                </th>
                                <td>
                                    {{ $incidentReport->date_incident }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.nama_pelapor') }}
                                </th>
                                <td>
                                    {{ $incidentReport->nama_pelapor->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.dept_origin') }}
                                </th>
                                <td>
                                    {{ $incidentReport->dept_origin->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.basic_cause') }}
                                </th>
                                <td>
                                    {{ $incidentReport->root_cause->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.category') }}
                                </th>
                                <td>
                                    {{ $incidentReport->category->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.classify') }}
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
                                    {{ trans('cruds.incidentReport.fields.area') }}
                                </th>
                                <td>
                                    {{ $incidentReport->area->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.location') }}
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
                                    {{ trans('cruds.historyMyIncidentReport.fields.description') }}
                                </th>
                                <td>
                                    {{ $incidentReport->description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.photos') }}
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
                                    {{ trans('cruds.historyMyIncidentReport.fields.reviewed_by') }}
                                </th>
                                <td>
                                    {{ $incidentReport->reviewed_by->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.reviewed_time') }}
                                </th>
                                <td>
                                    {{ $incidentReport->reviewed_at ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.acknowledged_by') }}
                                </th>
                                <td>
                                    {{ $incidentReport->acknowledged_by->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.acknowledged_time') }}
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
                                    {{ trans('cruds.historyMyIncidentReport.fields.dept_designated') }}
                                </th>
                                <td>
                                    {{ $incidentReport->dept_designated->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.perbaikan') }}
                                </th>
                                <td>
                                    {{ $incidentReport->perbaikan }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.pencegahan') }}
                                </th>
                                <td>
                                    {{ $incidentReport->pencegahan }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.action_by') }}
                                </th>
                                <td>
                                    {{ $incidentReport->action_by->name ?? '' }}
                                </td>
                            </tr>    
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.date_action') }}
                                </th>
                                <td>
                                    {{ $incidentReport->date_action }}
                                </td>
                            </tr> 
                            <tr>
                                    <th>
                                        {{ trans('cruds.taskIncidentReport.fields.file_investigation') }}
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
                                    {{ trans('cruds.historyMyIncidentReport.fields.result') }}
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
                                    {{ trans('cruds.historyMyIncidentReport.fields.status') }}
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
                            @if($incidentReport->reason !== NULL)
                            <tr>
                                <th>
                                    {{ trans('cruds.historyMyIncidentReport.fields.reason') }}
                                </th>
                                <td>
                                    {{ $incidentReport->reason }}
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.history-my-incident-reports.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                </div>
            </div>


        </div>



    </div>
</div>
</div>
@endsection
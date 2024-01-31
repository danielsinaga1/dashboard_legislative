@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.show') }} {{ trans('cruds.incidentReport.title') }}
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.nonconformity-reports.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th colspan="2" style="text-align:center;background-color:#80ced6">Initiator</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.no_laporan') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->no_laporan ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>

                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.date_event') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->date_event ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.nama_pelapor') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->nama_pelapor->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.dept_origin') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->dept_origin->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.ncr_issue') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->root_cause->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.area') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->area->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.region') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->region->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.location') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->location->name ?? '-' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.entity') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->entity->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.description') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->description ?? '-' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.reviewed_by') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->reviewed_by->name ?? '-' }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.reviewed_time') }}
                                        </th>
                                        <td>
                                            @if (isset($nonConformity->reviewed_at))
                                                {{ Carbon\Carbon::parse($incidentReport->acknowledged_at)->format('d-M-Y H:i:s') }}
                                            @else
                                                {{ '-' }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.acknowledged_by') }}
                                        </th>
                                        <td>
                                            {{ $incidentReport->acknowledged_by->name ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.acknowledged_time') }}
                                        </th>
                                        <td>
                                            @if (isset($incidentReport->acknowledged_at))
                                                {{ Carbon\Carbon::parse($incidentReport->acknowledged_at)->format('d-M-Y H:i:s') }}
                                            @else
                                                {{ '-' }}
                                            @endif
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th colspan="2" style="text-align:center;background-color:#80ced6">Executor</th>
                                    </tr>
                                    {{-- <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.dept_designated') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->dept_designated->name ?? '' }}
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.perbaikan') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->corrective }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.pencegahan') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->preventive }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.myIncidentReport.fields.photos') }}
                                        </th>
                                        <td>
                                            @foreach ($nonConformity->photos as $key => $media)
                                                <a href="{{ $media->getFullUrl() }}" target="_blank">
                                                    <img src="{{ $media->getFullUrl('thumb') }}" width="50px"
                                                        height="50px">
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.action_by') }}
                                        </th>
                                        <td>
                                            {{ $nonConformity->action_by->name ?? '' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.date_action') }}
                                        </th>
                                        <td>
                                            @if (isset($nonConformity->date_action))
                                                {{ Carbon\Carbon::parse($nonConformity->date_action)->format('d-M-Y H:i:s') }}
                                            @else
                                                {{ '-' }}
                                            @endif
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th>
                                            {{ trans('cruds.incidentReport.fields.result') }}
                                        </th>
                                        <td>
                                            @if ($nonConformity->result->id === 4)
                                                <span class="label label-info">
                                                    {{ $nonConformity->result->name ?? '' }}
                                                </span>
                                            @elseif($nonConformity->result->id === 1)
                                                <span class="label label-warning">
                                                    {{ $nonConformity->result->name ?? '' }}
                                                </span>
                                            @elseif($nonConformity->result->id === 2)
                                                <span class="label label-success">
                                                    {{ $nonConformity->result->name ?? '' }}
                                                </span>
                                            @elseif($nonConformity->result->id === 3)
                                                <span class="label label-danger">
                                                    {{ $nonConformity->result->name ?? '' }}
                                                </span>
                                            @elseif($nonConformity->result->id === 5)
                                                <span class="label label-primary">
                                                    {{ $nonConformity->result->name ?? '' }}
                                                </span>
                                            @elseif($nonConformity->result->id === 6)
                                                <span class="label label-default">
                                                    {{ $nonConformity->result->name ?? '' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.status') }}
                                        </th>
                                        <td>
                                            @if ($nonConformity->status === 'Open')
                                                <span class="text-red">
                                                    {{ $nonConformity->status ?? '' }}
                                                </span>
                                            @elseif($nonConformity->status === 'Close')
                                                <span class="text-green">
                                                    {{ $nonConformity->status ?? '' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.nonconformity-reports.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>

                            @if (auth()->user()->is_superintendent && $nonConformity->corrective != null)
                                <div class="panel-footer">
                                    <a href="{{ route('admin.task-nonconformity-reports.actionByExecutor', $nonConformity->id) }}"
                                        class="btn btn-success">Submit</a>
                                    {{-- <div class="pull-right">
                                    <a class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_lis    t') }}
                                </a>
                            </div> --}}
                                </div>
                            @endif

                            @if (auth()->user()->is_manager)
                                <div class="panel-footer">
                                    <a href="{{ route('admin.task-nonconformity-reports.approvalByManager', $nonConformity->id) }}"
                                        class="btn btn-success">Approve</a>

                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-placement="top"
                                        title="Reason Modal" data-target="#modalReject" data-original-title="Reason Modal"
                                        id="rejectBtn" data-myreason="{{ $nonConformity->reason2 }}">Reject
                                    </a>
                                    @include('partials.modals_non_conformity_reports_rejected_manager_executor')
                                    {{-- <div class="pull-right">
                                    <a class="btn btn-default" href="{{ url()->previous() }}">
                                {{ trans('global.back_to_list') }}
                                </a>
                            </div> --}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>



        @if ($nonConformity->result_id == 7 || $nonConformity->result_id == 8 || $nonConformity->result_id == 3)
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Comment</h3>
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
                                    @foreach ($comment_nonconformitys as $key => $comment_nonconformity)
                                        <tr data-entry-id="{{ $comment_nonconformity->id }}">

                                            <td>
                                                {{ $comment_nonconformity->name_report->name ?? '-' }}
                                            </td>
                                            <td>
                                                @if ($comment_nonconformity->result->id == 4)
                                                    <span class="label label-info">
                                                        {{ $comment_nonconformity->result->name ?? '-' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id == 1)
                                                    <span class="label label-warning">
                                                        {{ $comment_nonconformity->result->name ?? '-' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id == 2)
                                                    <span class="label label-success">
                                                        {{ $comment_nonconformity->result->name ?? '-' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id == 3)
                                                    <span class="label label-danger">
                                                        {{ $comment_nonconformity->result->name ?? '-' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id == 5)
                                                    <span class="label label-primary">
                                                        {{ $comment_nonconformity->result->name ?? '-' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id == 6)
                                                    <span class="label label-default">
                                                        {{ $comment_nonconformity->result->name ?? '-' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id === 7)
                                                    <span class="label label-default">
                                                        {{ $comment_nonconformity->result->name ?? '' }}
                                                    </span>
                                                @elseif($comment_nonconformity->result->id === 8)
                                                    <span class="label label-danger">
                                                        {{ $comment_nonconformity->result->name ?? '' }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td>
                                                <strong>{{ $comment_nonconformity->description ?? '-' }}
                                            </td>

                                            <td>
                                                @if (isset($comment_nonconformity->created_at))
                                                    {{ \Carbon\Carbon::parse($comment_nonconformity->created_at)->format('d M Y H:i:s') }}
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
        @endif
    </div>
@endsection

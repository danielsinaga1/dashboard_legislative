@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.historyTaskIncidentReport.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table
                            class=" table table-bordered table-striped table-hover datatable datatable-HistoryTaskIncidentReport">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.no_laporan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.date_incident') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.nama_pelapor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.dept_origin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.basic_cause') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.classify') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.area') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.chemical') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.reviewed_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.acknowledged_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.dept_designated') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.perbaikan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.pencegahan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.action_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.date_action') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.historyTaskIncidentReport.fields.status') }}
                                    </th>
                                    
                                    <th>
                                        {{trans('panel.action')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incidentReports as $key => $incidentReport)
                                <tr data-entry-id="{{ $incidentReport->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $incidentReport->no_laporan ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->date_incident ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->nama_pelapor->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->dept_origin->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->root_cause->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->category->name ?? '' }}
                                    </td>
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
                                    <td>
                                        {{ $incidentReport->area->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->location ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->chemical->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->description ?? '' }}
                                    </td>
                                    <td>
                                        @foreach($incidentReport->photos as $key => $media)
                                        <a href="{{ $media->getFullUrl() }}" target="_blank">
                                            <img src="{{ $media->getFullUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $incidentReport->reviewed_by->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->acknowledged_by->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $incidentReport->dept_designated->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->perbaikan ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->pencegahan ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->action_by->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->date_action ?? '' }}
                                    </td>
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
                                    <td>
                                        @can('history_task_incident_report_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.history-task-incident-reports.show', $incidentReport->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('task_incident_report_delete')
        let deleteButtonTrans = '{{ trans('
        global.datatables.delete ') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.history-task-incident-reports.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('
                        global.datatables.zero_selected ') }}')

                    return
                }

                if (confirm('{{ trans('
                        global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function () {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [
                [1, 'desc']
            ],
            pageLength: 100,
        });
        $('.datatable-HistoryTaskIncidentReport:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
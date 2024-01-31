<div class="content">
    @can('incident_report_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.incident-reports.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.incidentReport.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.incidentReport.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-IncidentReport">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.no_laporan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.nama_pelapor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.dept_origin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.root_cause') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.file') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.classify') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.perbaikan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.pencegahan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.date_incident') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.dept_designated') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.date_action') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.action_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.reviewed_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.acknowledged_by') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incidentReports as $key => $incidentReport)
                                    <tr data-entry-id="{{ $incidentReport->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $incidentReport->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->no_laporan ?? '' }}
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
                                            {{ $incidentReport->location ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($incidentReport->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($incidentReport->file as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $incidentReport->category->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->classify->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->perbaikan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->pencegahan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->date_incident ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->dept_designated->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->date_action ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->action_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->result->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->reviewed_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $incidentReport->acknowledged_by->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('incident_report_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.incident-reports.show', $incidentReport->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('incident_report_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.incident-reports.edit', $incidentReport->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('incident_report_delete')
                                                <form action="{{ route('admin.incident-reports.destroy', $incidentReport->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('incident_report_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.incident-reports.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-IncidentReport:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
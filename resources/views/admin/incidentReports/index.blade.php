@extends('layouts.admin')
@section('content')
<div class="content">
    @can('incident_report_create')
        {{-- <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.incident-reports.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.incidentReport.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'IncidentReport', 'route' => 'admin.incident-reports.parseCsvImport'])
            </div>
        </div> --}}
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="date_filter" id="date_filter"/>
                    </div>
                    <div class="col-md-8">
                        <input type="submit" name="filter_submit" class="btn btn-success" value="Filter" />
                    </div>
                </div>
                </form>
                
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
                                        {{ trans('cruds.incidentReport.fields.no_laporan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.date_incident') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.nama_pelapor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.dept_origin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.basic_cause') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.classify') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.area') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.chemical') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.reviewed_by') }}
                                    </th>
                                    @if(auth()->user()->is_admin || auth()->user()->is_administrator || auth()->user()->is_administrator2)
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.reviewed_time') }}
                                    </th>
                                    @endif
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.acknowledged_by') }}
                                    </th>
                                    @if(auth()->user()->is_admin || auth()->user()->is_administrator || auth()->user()->is_administrator2)
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.acknowledged_time') }}
                                    </th>
                                    @endif
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.dept_designated') }}
                                    </th>                              
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.perbaikan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.pencegahan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.action_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.date_action') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.status') }}
                                    </th>
                                    @if(auth()->user()->is_admin || auth()->user()->is_administrator  || auth()->user()->is_administrator2)
                                    <th>
                                        {{ trans('cruds.incidentReport.fields.copq') }}
                                    </th>
                                    @endif
                                    <th>
                                        {{trans('panel.action')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(auth()->user()->is_admin || auth()->user()->is_administrator || auth()->user()->is_administrator2)
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
                                    @if(strlen($incidentReport->description) > 25)
                                        {{substr($incidentReport->description,0,25)}}
                                        <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                                        <span class="read-more-content"> {{substr($incidentReport->description,25,strlen($incidentReport->description))}} 
                                        <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                                    @else
                                        {{ $incidentReport->description ?? '' }}
                                    @endif
                                        {{-- <!-- {{ $incidentReport->description ?? '' }} --> --}}
                                    </td>
                                    <td>
                                        @foreach($incidentReport->photos as $key => $media)
                                        <a href="{{ $media->getFullUrl() }}" target="_blank">
                                            <img src="{{ $media->getFullUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $incidentReport->reviewed_by->name ?? '-' }}
                                    </td>
                                    <td>
                                        @if(isset($incidentReport->reviewed_at))
                                            {{ Carbon\Carbon::parse($incidentReport->reviewed_at)->format('d-M-Y H:i:s')}}    
                                        @else
                                            {{ '-' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $incidentReport->acknowledged_by->name ?? '-' }}
                                    </td>
                                    <td>
                                        @if(isset($incidentReport->acknowledged_at))
                                            {{ Carbon\Carbon::parse($incidentReport->acknowledged_at)->format('d-M-Y H:i:s')}}    
                                        @else
                                            {{ '-' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $incidentReport->dept_designated->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->perbaikan ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->pencegahan ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->action_by->name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->date_action ?? '-' }}
                                    </td>
                                    <td>
                                        @if($incidentReport->result->id === 4)
                                        <span class="label label-info">
                                            {{ $incidentReport->result->name ?? '-' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 1)
                                        <span class="label label-warning">
                                            {{ $incidentReport->result->name ?? '-' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 2)
                                        <span class="label label-success">
                                            {{ $incidentReport->result->name ?? '-' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 3)
                                        <span class="label label-danger">
                                            {{ $incidentReport->result->name ?? '-' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 5)
                                        <span class="label label-primary">
                                            {{ $incidentReport->result->name ?? '-' }}
                                        </span>
                                        @elseif($incidentReport->result->id === 6)
                                        <span class="label label-default">
                                            {{ $incidentReport->result->name ?? '-' }}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($incidentReport->status === 'Open')
                                        <span class="text-red">
                                            {{ $incidentReport->status ?? '-' }}
                                        </span>
                                        @elseif($incidentReport->status === 'Close')
                                        <span class="text-green">
                                            {{ $incidentReport->status ?? '-' }}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        ${{ number_format($incidentReport->copq, 2) }}
                                        <!-- {{ $incidentReport->copq ?? '-' }} -->
                                    </td>
                                    <td>
                                        @can('incident_report_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.incident-reports.show', $incidentReport->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan

                                        @can('incident_report_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.incident-reports.edit', $incidentReport->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                        @endcan

                                        @can('incident_report_delete')
                                        <form
                                            action="{{ route('admin.incident-reports.destroy', $incidentReport->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                        @endcan

                                    </td>

                                </tr>
                                @endforeach
                            @else
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
                                @if(strlen($incidentReport->description) > 100)
                                    {{substr($incidentReport->description,0,100)}}
                                    <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                                    <span class="read-more-content"> {{substr($incidentReport->description,100,strlen($incidentReport->description))}} 
                                    <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                                @else
                                    {{ $incidentReport->description ?? '' }}
                                @endif
                                    <!-- {{ $incidentReport->description ?? '' }} -->
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
                                    {{ $incidentReport->pencegahan ?? '-' }}
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
                                    @can('my_incident_report_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.incident-reports.show', $incidentReport->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    @endcan

                                    {{-- @can('my_incident_report_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.my-incident-reports.edit', $item->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    @endcan

                                    @can('my_incident_report_delete')
                                    <form action="{{ route('admin.my-incident-reports.destroy', $item->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                    @endcan --}}

                                </td>
                            </tr>
                            @endforeach
                            @endif
                               
                                
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
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
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
    pageLength: 100,
  });
  $('.datatable-IncidentReport:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
<script type="text/javascript">
    $(function () {
        let dateInterval = getQueryParameter('date_filter');
        let start = moment().startOf('isoWeek');
        let end = moment().endOf('isoWeek');
        if (dateInterval) {
            dateInterval = dateInterval.split(' - ');
            start = dateInterval[0];
            end = dateInterval[1];
        }
        $('#date_filter').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "alwaysShowCalendars": true,
            startDate: start,
            endDate: end,
            locale: {
                format: 'YYYY-MM-DD',
                firstDay: 1,
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
            }
        });
    });
    function getQueryParameter(name) {
        const url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script>
{{-- <script type="text/javascript">
    $(function () {
        let dateInterval = getQueryParameter('date_filter');
        let start = moment().startOf('isoWeek');
        let end = moment().endOf('isoWeek');
        if (dateInterval) {
            dateInterval = dateInterval.split(' - ');
            start = dateInterval[0];
            end = dateInterval[1];
        }
        $('#date_filter').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "alwaysShowCalendars": true,
            startDate: start,
            endDate: end,
            locale: {
                format: 'YYYY-MM-DD',
                firstDay: 1,
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
            }
        });
    });
    function getQueryParameter(name) {
        const url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script> --}}
<script type="text/javascript">
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
            $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            // Set up the toggle effect:
            $('.read-more-show').on('click', function(e) {
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            // Changes contributed by @diego-rzg
            $('.read-more-hide').on('click', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
              e.preventDefault();
            });
</script>
@endsection
@extends('layouts.admin')
@section('content')
<div class="content">
    @can('my_incident_report_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.my-incident-reports.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.incidentReport.title_singular') }}
                </a>
                @if(auth()->user()->is_admin)
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'IncidentReport', 'route' => 'admin.my-incident-reports.parseCsvImport'])
                @endif
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            
            {{-- <form method="get">
                <div class="row">
                    <div class="col-xs-2 col-md-2 form-group">
                        <label for='from' class='control-label'>{{ trans('global.timeFrom') }}</label>
                        <input type="text" id="from" name="from" class="form-control date" value="{{ old('from', request()->get('from', date('Y-m-d'))) }}">
                    </div>
                    <div class="col-xs-2 col-md-2 form-group">
                        <label for='to' class='control-label'>{{ trans('global.timeTo') }}</label>
                        <input type="text" id="to" name="to" class="form-control date" value="{{ old('to', request()->get('to', date('Y-m-d'))) }}">
                    </div>
                    <div class="col-xs-4">
                        <label class="control-label">&nbsp;</label><br>
                        <button type="submit" class="btn btn-primary">{{ trans('global.filterDate') }}</button>
                    </div>
                </div>
            </form> --}}

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.incidentReport.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <form action="" id="filtersForm">
                                    <div class="input-group">
                                        <input type="text" name="from-to" class="form-control mr-2" id="date_filter">
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-primary" value="Filter">
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <table class="table table-bordered table-striped table-hover datatable datatable-MyIncidentReport">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.no_laporan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.date_incident') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.nama_pelapor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.dept_origin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.basic_cause') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.classify') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.area') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.chemical') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.photos') }}
                                    </th>

                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.reviewed_by') }}
                                    </th>

                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.acknowledged_by') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.myIncidentReport.fields.file') }}
                                    </th> --}}
                                    
                                    {{-- <th>
                                        {{ trans('cruds.myIncidentReport.fields.perbaikan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.pencegahan') }}
                                    </th> --}}
                                    
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.dept_designated') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.myIncidentReport.fields.date_action') }}
                                    </th> --}}
                                     <th>
                                        {{ trans('cruds.myIncidentReport.fields.action_by') }}
                                    </th>
                                    
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.myIncidentReport.fields.status') }}
                                    </th>
                                    <th>
                                        {{trans('panel.action')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incidentReports as $key => $incidentReport)
                                @if($incidentReport->status === 'Open')
                                
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
                                        {{ $incidentReport->reviewed_by->name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->acknowledged_by->name ?? '-' }}
                                    </td>
                                    {{-- <td>
                                        @foreach($incidentReport->file as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td> --}}
                                    {{-- <td>
                                        {{ $incidentReport->perbaikan ?? '' }}
                                    </td>
                                    <td>
                                        {{ $incidentReport->pencegahan ?? '' }}
                                    </td> --}}
                                    <td>
                                        {{ $incidentReport->dept_designated->name ?? '' }}
                                    </td>
                                    {{-- <td>
                                        {{ $incidentReport->date_action ?? '' }}
                                    </td> --}}
                                     <td>
                                        {{ $incidentReport->action_by->name ?? '-' }}
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
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.my-incident-reports.show', $incidentReport->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan

                                        @if(auth()->user()->is_superintendent || auth()->user()->is_superadministrator || auth()->user()->is_administrator)
                                        @can('my_incident_report_edit')
                                            @if($incidentReport->result->id === 4)
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.my-incident-reports.edit', $incidentReport->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endif
                                        @endcan
                                        @endif
                                        
                                        @if(auth()->user()->is_manager)
                                        @can('my_incident_report_edit')
                                          @if($incidentReport->result->id === 1)
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.my-incident-reports.edit', $incidentReport->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            @endif
                                        @endcan
                                        @endif

                                        @can('my_incident_report_delete')
                                            <form action="{{ route('admin.my-incident-reports.destroy', $incidentReport->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                                @endif
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
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
 <!-- Include Required Prerequisites -->
 <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

 <!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>

<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('my-incident_report_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.my-incident-reports.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-MyIncidentReport:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
  <script>
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

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
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
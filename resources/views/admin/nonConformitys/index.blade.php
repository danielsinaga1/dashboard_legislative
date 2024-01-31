@extends('layouts.admin')
@extends('partials.modals_question_nonconformity_reports')
@section('content')
    <div class="content">
        @can('nonconformity_report_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">

                    <a class="btn btn-success" href="#" data-toggle="modal" data-placement="top" title="Reason Modal"
                        data-target="#modalQuestion" data-original-title="Reason Modal">
                        {{ trans('global.add') }} {{ trans('cruds.nonConformityReport.title_singular') }}
                    </a>



                </div>
            </div>
        @endcan
        {{-- @include('partials.modals_question_nonconformity_reports') --}}
        {{-- <a class="btn btn-success" href="#" data-toggle="modal" data-placement="top" title="Reason Modal"
            data-target="#modalQuestion" data-original-title="Reason Modal">
            {{ trans('global.add') }} {{ trans('cruds.nonConformityReport.title_singular') }}
        </a> --}}

        <div class="row">
            <div class="col-lg-12">


                {{-- <form action="" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="date_filter" id="date_filter" />
                        </div>
                        <div class="col-md-8">
                            <input type="submit" name="filter_submit" class="btn btn-success" value="Filter" />
                        </div>
                    </div>
                </form> --}}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.nonConformityReport.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table
                                class=" table table-bordered table-striped table-hover datatable datatable-NonConformityReport">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.no_laporan') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.date_event') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.nama_pelapor') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.dept_origin') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.ncr_issue') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.area') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.location') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.entity') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.description') }}
                                        </th>
                                        {{-- <th>
                                            {{ trans('cruds.nonConformityReport.fields.dept_designated') }}
                                        </th> --}}
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.corrective') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.preventive') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.assigned_to') }}
                                        </th>

                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.assigned_at') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.acknowledged_by') }}
                                        </th>
                                        {{-- <th>
                                            {{ trans('cruds.nonConformityReport.fields.date_action') }}
                                        </th> --}}
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.result') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.status') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.checked_jso') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.date_overdue') }}
                                        </th>
                                        <th>
                                            {{ trans('panel.action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nonConformityReports as $key => $nonConformityReport)
                                        <tr data-entry-id="{{ $nonConformityReport->id }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $nonConformityReport->no_laporan ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->date_event ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->nama_pelapor->name ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->dept_origin->name ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->root_cause->name ?? '-' }}
                                            </td>

                                            <td>
                                                {{ $nonConformityReport->area->name ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->location->name ?? '-' }}
                                            </td>

                                            <td>
                                                {{ $nonConformityReport->entity->name ?? '-' }}
                                            </td>

                                            <td>
                                                @if (strlen($nonConformityReport->description) > 100)
                                                    {{ substr($nonConformityReport->description, 0, 100) }}
                                                    <span class="read-more-show hide_content">More<i
                                                            class="fa fa-angle-down"></i></span>
                                                    <span class="read-more-content">
                                                        {{ substr($nonConformityReport->description, 100, strlen($nonConformityReport->description)) }}
                                                        <span class="read-more-hide hide_content">Less <i
                                                                class="fa fa-angle-up"></i></span> </span>
                                                @else
                                                    {{ $nonConformityReport->description ?? '' }}
                                                @endif

                                            </td>

                                            {{-- <td>
                                                {{ $nonConformityReport->dept_designated->name ?? '-' }}
                                            </td> --}}
                                            <td>
                                                {{ $nonConformityReport->corrective ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->preventive ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->action_by->name ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->assigned_at ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->acknowledged_by->name ?? '' }}
                                            </td>
                                            {{-- <td>
                                                {{ $nonConformityReport->date_action ?? '' }}
                                            </td> --}}
                                            <td>
                                                @if ($nonConformityReport->result->id === 4)
                                                    <span class="label label-info">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 1)
                                                    <span class="label label-warning">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 2)
                                                    <span class="label label-success">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 3)
                                                    <span class="label label-danger">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 5)
                                                    <span class="label label-primary">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 6)
                                                    <span class="label label-default">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 7)
                                                    <span class="label label-default">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->result->id === 8)
                                                    <span class="label label-danger">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                    @elseif($nonConformityReport->result->id === 9)
                                                    <span class="label label-danger">
                                                        {{ $nonConformityReport->result->name ?? '' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($nonConformityReport->status === 'Open')
                                                    <span class="text-red">
                                                        {{ $nonConformityReport->status ?? '' }}
                                                    </span>
                                                @elseif($nonConformityReport->status === 'Close')
                                                    <span class="text-green">
                                                        {{ $nonConformityReport->status ?? '' }}
                                                    </span>
                                                @endif
                                            </td>

                                            @if ($nonConformityReport->is_jso == 1)
                                            <td>{{ "Ya" }}</td>
                                            @else
                                            <td>{{ "Tidak" }}</td>
                                            @endif

                                               <td>
                                                <span class="text-red">
                                                    {{ "Overdue" . " ". $nonConformityReport->created_at->diffForHumans() ?? '' }}
                                                </span>

                                            </td>
                                            <td>
                                                @can('nonconformity_report_show')
                                                    <a class="btn btn-xs btn-primary"
                                                        href="{{ route('admin.nonconformity-reports.show', $nonConformityReport->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                {{-- @can('task_nonconformity_report_edit')
                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.task-nonconformity-reports.edit', $nonConformityReport->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endcan --}}


                                                @if (auth()->user()->is_superintendent)
                                                    @can('nonconformity_report_edit')
                                                        @if (
                                                            $nonConformityReport->result->id === 4 ||
                                                                $nonConformityReport->result->id === 3 ||
                                                                $nonConformityReport->result->id === 8)
                                                            <a class="btn btn-xs btn-info"
                                                                href="{{ route('admin.nonconformity-reports.edit', $nonConformityReport->id) }}">
                                                                {{ trans('global.edit') }}
                                                            </a>
                                                        @endif
                                                    @endcan
                                                @else
                                                    @can('nonconformity_report_edit')
                                                        <a class="btn btn-xs btn-info"
                                                            href="{{ route('admin.nonconformity-reports.edit', $nonConformityReport->id) }}">
                                                            {{ trans('global.edit') }}
                                                        </a>
                                                    @endcan
                                                @endif


                                                @can('nonconformity_report_delete')
                                                    <form
                                                        action="{{ route('admin.nonconformity-reports.destroy', $nonConformityReport->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('nonconformity_report_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.nonconformity-reports.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
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
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                pageLength: 100,
            });
            $('.datatable-NonConformityReport:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
    <script type="text/javascript">
        $(function() {
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
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')],
                    'This Year': [moment().startOf('year'), moment().endOf('year')],
                    'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year')
                        .endOf('year')
                    ],
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

        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });
    </script>
@endsection

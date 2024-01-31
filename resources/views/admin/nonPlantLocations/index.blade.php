@extends('layouts.admin')
@section('content')
    <div class="content">
        @can('nonplant_location_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin.nonplant-locations.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.nonPlantlocation.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.nonPlantlocation.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table
                                class=" table table-bordered table-striped table-hover datatable datatable-NonPlantLocation">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.nonPlantlocation.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonPlantlocation.fields.name') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nonPlantLocations as $key => $nonPlantLocation)
                                        <tr data-entry-id="{{ $nonPlantLocation->id }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $nonPlantLocation->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $nonPlantLocation->name ?? '' }}
                                            </td>
                                            <td>
                                                @can('nonplant_location_show')
                                                    <a class="btn btn-xs btn-primary"
                                                        href="{{ route('admin.nonplant-locations.show', $nonPlantLocation->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                @can('nonplant_location_edit')
                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.nonplant-locations.edit', $nonPlantLocation->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endcan

                                                @can('nonplant_location_delete')
                                                    <form
                                                        action="{{ route('admin.nonplant-locations.destroy', $nonPlantLocation->id) }}"
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
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('location_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.nonplant-locations.massDestroy') }}",
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
                order: [
                    [1, 'asc']
                ],
                pageLength: 100,
            });
            $('.datatable-NonPlantLocation:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection

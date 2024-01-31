@extends('layouts.admin')
@section('content')
<div class="content">
    @can('investigation_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.investigation-details.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.investigationDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    {{ trans('cruds.investigationDetail.fields.perbaikan') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-classificationDistribution">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.investigationDetail.fields.id') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.recommendation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.pic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.deadline') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.actual') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($correctives as $key => $corrective)
                                    <tr data-entry-id="{{ $corrective->id }}">
                                        <td>

                                        </td>
                                        {{-- <td>
                                            {{ $corrective->id ?? '-' }}
                                        </td> --}}
                                        <td>
                                            {!! $corrective->recommendation ?? '-' !!}
                                        </td>
                                    
                                        <td>
                                            {{ $corrective->picInvestigation->name ?? '-' }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($corrective->date_deadline)->format('d-M-Y H:i') ?? '-'}}
                                            
                                        </td>
                                        <td>
                                            {{-- {{ Carbon\Carbon::parse($corrective->date_actual)->format('d-M-Y H:i') ?? '-'}} --}}
                                            {{ $corrective->date_actual ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $corrective->status ?? '-' }}
                                        </td>
                                        
                                        <td>
                                            @can('investigation_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.investigation-details.show', $corrective->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('investigation_detail_edit')
                                                @if ($corrective->status == 'Open')
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.investigation-details.edit', $corrective->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>    
                                                @endif
                                                
                                            @endcan

                                            @can('investigation_detail_delete')
                                                <form action="{{ route('admin.investigation-details.destroy', $corrective->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ trans('cruds.investigationDetail.fields.pencegahan') }} 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-classificationDistribution">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.investigationDetail.fields.id') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.recommendation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.pic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.deadline') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.actual') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($preventives as $key => $preventive)
                                    <tr data-entry-id="{{ $preventive->id }}">
                                        <td>

                                        </td>
                                        {{-- <td>
                                            {{ $preventive->id ?? '-' }}
                                        </td> --}}
                                        <td>
                                            {!! $preventive->recommendation ?? '-' !!}
                                        </td>
                                        <td>
                                            {{ $preventive->picInvestigation->name ?? '-' }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($preventive->date_deadline)->format('d-M-Y H:i') ?? '-'}}
                                            {{-- {{ $preventive->date_deadline ?? '-' }} --}}
                                        </td>
                                        <td>
                                            {{ $preventive->date_actual ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $preventive->status ?? '-' }}
                                        </td>
                                        
                                        <td>
                                            @can('investigation_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.investigation-details.show', $preventive->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('investigation_detail_edit')
                                            @if ($preventive->status == 'Open')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.investigation-details.edit', $preventive->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endif
                                            @endcan

                                            @can('investigation_detail_delete')
                                                <form action="{{ route('admin.investigation-details.destroy', $preventive->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('investigation_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.investigation-details.massDestroy') }}",
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
  $('.datatable-classificationDistribution:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
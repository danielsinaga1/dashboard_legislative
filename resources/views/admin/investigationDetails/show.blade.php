@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.investigationDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{-- <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.investigation-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div> --}}
                        <table class="table table-bordered table-striped">
                            <tbody>
                                {{-- <tr>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $investigationDetail->id ?? '-'}}
                                    </td>
                                </tr> --}}
                                <tr>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.recommendation') }}
                                    </th>
                                    <td>
                                        {!! $investigationDetail->recommendation !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.pic') }}
                                    </th>
                                    <td>
                                        {{ $investigationDetail->picInvestigation->name ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.deadline') }}
                                    </th>
                                    <td>
                                        {{ Carbon\Carbon::parse($investigationDetail->date_deadline)->format('d-M-Y H:i') ?? '-'}}
                                        {{-- {{ $investigationDetail->date_deadline ?? '-' }} --}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.actual') }}
                                    </th>
                                    <td>
                                        {{-- {{ Carbon\Carbon::parse($investigationDetail->actual)->format('d-M-Y H:i') ?? '-'}} --}}
                                        {{ $investigationDetail->date_actual ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investigationDetail.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $investigationDetail->status ?? '-' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.investigation-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>

                        <div class="panel-footer">
                            @if($investigationDetail->date_actual != null && $investigationDetail->status == 'Open')
                            <a href="{{ route('admin.investigation-details.actionByExecutor' , $investigationDetail->id) }}"
                                class="btn btn-success">Done
                            </a>
            
                            {{-- <a href="#" class="btn btn-danger" data-toggle="modal" data-placement="top" title="Reason Modal"
                                data-target="#modalReject" data-original-title="Reason Modal" id="rejectBtn"
                                data-myreason="{{$incidentReport->reason}}">Reject
                            </a> --}}

                            {{-- @include('partials.modals_my_incident_reports_rejected_spdt')
                            <div class="pull-right">
                                <a class="btn btn-default" href="{{ url()->previous() }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div> --}}
                            @endif
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.create') }} {{ trans('cruds.nonConformityReport.title_singular') }}
                    </div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.nonconformity-reports.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-check {{ $errors->has('is_jso') ? 'has-error' : '' }}">
                                <label class="form-check-label"
                                    for="is_jso">{{ trans('cruds.nonConformityReport.fields.checked_jso') }}</label>

                                    <input type="hidden" name="is_jso" value="0">
                                    <input class="form-check-input" type="checkbox" name="is_jso" id="is_jso"
                                            @if($nonConformity->is_jso) checked @endif value="1">


                                @if ($errors->has('is_jso'))
                                    <span class="help-block" role="alert">{{ $errors->first('is_jso') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.checked_jso_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                                <label for="area"
                                    class="required">{{ trans('cruds.myIncidentReport.fields.area') }}</label>
                                <select name="area_id" id="area" class="form-control select2" required>
                                    @foreach ($area_incidents as $id => $area_incident)
                                        <option value="{{ $id }}"
                                            {{ (isset($nonConformity) && $nonConformity->area ? $nonConformity->area->id : old('area_id')) == $id ? 'selected' : '' }}>
                                            {{ $area_incident }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('area_id'))
                                    <p class="help-block">
                                        {{ $errors->first('area_id') }}
                                    </p>
                                @endif
                            </div>

                            {{-- <div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}" id="regionDiv">
                                <label for="region"
                                    class="required">{{ trans('cruds.nonConformityReport.fields.region') }}</label>
                                <select name="region_id" class="form-control select2" id="region_id" required>
                                    @foreach ($region_ncrs as $id => $region_ncr)
                                        <option value="{{ $id }}"
                                            {{ (isset($nonConformity) && $nonConformity->region ? $nonConformity->region->id : old('region_id')) == $id ? 'selected' : '' }}>
                                            {{ $region_ncr }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('region_id'))
                                    <p class="help-block">
                                        {{ $errors->first('region_id') }}
                                    </p>
                                @endif
                            </div> --}}

                            <div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}" id="regionDiv">
                                <label for="region_id">{{ trans('cruds.nonConformityReport.fields.region') }}</label>
                                <select class="form-control select2" name="region_id" id="region_id">
                                    @foreach ($region_ncrs as $id => $region_ncr)
                                        <option value="{{ $id }}"
                                            {{ old('region_id') == $id ? 'selected' : '' }}>{{ $region_ncr }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.region_helper') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('location_ncr_id') ? 'has-error' : '' }}"
                                id="locationDiv">
                                <label for="location"
                                    class="required">{{ trans('cruds.nonConformityReport.fields.location') }}</label>
                                <div class="form-group {{ $errors->has('location_ncr_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="location_ncr_id" id="location_ncr_id">
                                        <option value="">Select Child Option</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('non_plant_location_id') ? 'has-error' : '' }}"
                                id="nonPlantLocationDiv">
                                <label for="region"
                                    class="required">{{ trans('cruds.nonConformityReport.fields.nonPlantlocation') }}</label>
                                <select name="non_plant_location_id" class="form-control select2" id="non_plant_location_id"
                                    data-placeholder="Select Location">
                                    @foreach ($nonPlantlocations as $id => $nonPlantlocation)
                                        <option value="{{ $id }}"
                                            {{ (isset($nonConformity) && $nonConformity->non_plant_location ? $nonConformity->non_plant_location->id : old('non_plant_location_id')) == $id ? 'selected' : '' }}>
                                            {{ $nonPlantlocation }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('non_plant_location_id'))
                                    <p class="help-block">
                                        {{ $errors->first('non_plant_location_id') }}
                                    </p>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('root_cause') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="root_cause_id">{{ trans('cruds.nonConformityReport.fields.ncr_issue') }}</label>
                                <select class="form-control select2" name="root_cause_id" id="root_cause_id" required>
                                    @foreach ($root_causes as $id => $root_cause)
                                        <option value="{{ $id }}"
                                            {{ old('root_cause_id') == $id ? 'selected' : '' }}>{{ $root_cause }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.ncr_issue_helper') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('entity_id') ? 'has-error' : '' }}" id="entityDiv">
                                <label class="required"
                                    for="entity_id">{{ trans('cruds.nonConformityReport.fields.entity') }}</label>
                                <select class="form-control select2" name="entity_id" id="entity_id">
                                    @foreach ($entitys as $id => $entity)
                                        <option value="{{ $id }}"
                                            {{ old('entity_id') == $id ? 'selected' : '' }}>{{ $entity }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.entity_helper') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('date_event') ? 'has-error' : '' }}">
                                <label for="date_incident"
                                    class="required">{{ trans('cruds.nonConformityReport.fields.date_event') }}</label>
                                <input class="form-control datetime" type="text" name="date_event" id="date_event"
                                    value="{{ old('date_event') }}">
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.date_event_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="description">{{ trans('cruds.nonConformityReport.fields.description') }}</label>
                                <input class="form-control" type="text" name="description" id="description"
                                    value="{{ old('description', '') }}" required>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.description_helper') }}</span>
                            </div>

                            @if (auth()->user()->is_administrator2)
                                <div class="form-group {{ $errors->has('dept_designated') ? 'has-error' : '' }}">
                                    <label
                                        for="assigned_to_id">{{ trans('cruds.nonConformityReport.fields.assigned_to') }}</label>
                                    <select class="form-control select2" name="assigned_to_id" id="assigned_to_id">
                                        @foreach ($actioned_bys as $id => $actioned_by)
                                            <option value="{{ $id }}"
                                                {{ old('assigned_to_id') == $id ? 'selected' : '' }}>{{ $actioned_by }}
                                            </option>

                                            {{-- <option value="{{ $id }}"
                                                {{ ($nonConformity->actioned_by ? $nonConformity->actioned_by->id : old('assigned_to_id')) == $id ? 'selected' : '' }}>
                                                {{ $actioned_by }}</option> --}}
                                        @endforeach
                                    </select>
                                    @if ($errors->has(''))
                                        <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.nonConformityReport.fields.assigned_to_helper') }}</span>
                                </div>
                            @endif

                            {{-- <div class="form-group {{ $errors->has('date_action') ? 'has-error' : '' }}">
                                <label
                                    for="date_action">{{ trans('cruds.nonConformityReport.fields.date_action') }}</label>
                                <input class="form-control datetime" type="text" name="date_action" id="date_action"
                                    value="{{ old('date_action') }}">
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.date_action_helper') }}</span>
                            </div> --}}


                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>

                        </form>


                    </div>
                </div>


            </div>
        </div>
{{--
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.filter') }} {{ trans('cruds.nonConformityReport.title_singular') }}
                    </div>
                    <div class="panel-body">
                        <form method="GET" action="" enctype="multipart/form-data">


                            <div class="col-md-4 form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                                <label for="area"
                                    class="required">{{ trans('cruds.myIncidentReport.fields.area') }}</label>
                                <select name="area_id" id="area2" class="form-control select2">
                                    @foreach ($area_incidents as $id => $area_incident)
                                        <option value="{{ $id }}"
                                            {{ (isset($nonConformity) && $nonConformity->area ? $nonConformity->area->id : old('area_id')) == $id ? 'selected' : '' }}>
                                            {{ $area_incident }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('area_id'))
                                    <p class="help-block">
                                        {{ $errors->first('area_id') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }} col-md-4"
                                id="regionDiv2">
                                <label for="region"
                                    class="required">{{ trans('cruds.myIncidentReport.fields.region') }}</label>
                                <select name="region_id" class="form-control select2" id="region_id2"
                                    data-placeholder="Select Region">
                                    @foreach ($region_ncrs as $id => $region_ncr)
                                        <option value="{{ $id }}"
                                            {{ (isset($nonConformity) && $nonConformity->region ? $nonConformity->region->id : old('region_id')) == $id ? 'selected' : '' }}>
                                            {{ $region_ncr }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('region_id'))
                                    <p class="help-block">
                                        {{ $errors->first('region_id') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('non_plant_location_id') ? 'has-error' : '' }} col-md-4"
                                id="nonPlantLocationDiv2">
                                <label for="region"
                                    class="required">{{ trans('cruds.nonConformityReport.fields.nonPlantlocation') }}</label>
                                <select name="non_plant_location_id" class="form-control select2"
                                    id="non_plant_location_id" data-placeholder="Select Location">
                                    @foreach ($nonPlantlocations as $id => $nonPlantlocation)
                                        <option value="{{ $id }}"
                                            {{ (isset($nonConformity) && $nonConformity->non_plant_location ? $nonConformity->non_plant_location->id : old('non_plant_location_id')) == $id ? 'selected' : '' }}>
                                            {{ $nonPlantlocation }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('non_plant_location_id'))
                                    <p class="help-block">
                                        {{ $errors->first('non_plant_location_id') }}
                                    </p>
                                @endif
                            </div>





                            <div class="form-group {{ $errors->has('location_ncr_id') ? 'has-error' : '' }} col-md-4"
                                id="locationDiv2">
                                <label for="location"
                                    class="required">{{ trans('cruds.myIncidentReport.fields.location') }}</label>
                                <div class="form-group {{ $errors->has('location_ncr_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2"name="location_ncr_id" id="location_ncr_id2">
                                        <option value="">Select Child Option</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group {{ $errors->has('entity_id') ? 'has-error' : '' }} col-md-4"
                                id="entityDiv2">
                                <label class="required"
                                    for="entity_id">{{ trans('cruds.nonConformityReport.fields.entity') }}</label>
                                <select class="form-control select2" name="entity_id" id="entity2">
                                    @foreach ($entitys as $id => $entity)
                                        <option value="{{ $id }}"
                                            {{ old('entity_id') == $id ? 'selected' : '' }}>{{ $entity }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.entity_helper') }}</span>
                            </div>



                            <div class="row">
                                <div class="col-md-8">
                                    <input type="submit" name="filter_submit" class="btn btn-success" value="Filter" />


                                    <button class="btn btn-success" type="submit">
                                        {{ trans('global.filter') }}
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div> --}}


        {{-- <div class="row">
            <div class="col-lg-12">

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
                                            {{ trans('cruds.nonConformityReport.fields.description') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.action_by') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.result') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.nonConformityReport.fields.status') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $nonConformityReport)
                                        <tr data-entry-id="{{ $nonConformityReport->id }}">
                                            <td>
                                                {{ $nonConformityReport->no_laporan ?? '' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->date_event ?? '' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->nama_pelapor->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->dept_origin->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->root_cause->name ?? '' }}
                                            </td>

                                            <td>
                                                {{ $nonConformityReport->area->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $nonConformityReport->location->name ?? '' }}
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
                                            <td>
                                                {{ $nonConformityReport->action_by->name ?? '' }}
                                            </td>

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
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}

    </div>

@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $("#area").change(function() {

                var area = $("#area").val();
                // var area = document.getElementById('area');
                // var userInput = area.options[area.selectedIndex].value;

                if (area == 1) {
                    $('#entityDiv').show();
                    $('#entityDiv').show();
                    $('#regionDiv').show();
                    $('#locationDiv').show();
                    $('#nonPlantLocationDiv').hide();

                    // document.getElementById('entityDiv').style.visibility = 'visible';
                    // document.getElementById('nonPlantLocationDiv').style.visibility = 'hidden';

                    console.log('Area 1 Called');
                } else if (area == 2) {

                    $('#entityDiv').hide();
                    $('#regionDiv').hide();
                    $('#locationDiv').hide();
                    $('#nonPlantLocationDiv').show();

                    // document.getElementById('nonPlantLocationDiv').style.visibility = 'visible';
                    // document.getElementById('entityDiv').style.visibility = 'hidden';
                    // document.getElementById('regionDiv').style.visibility = 'hidden';
                    // document.getElementById('locationDiv').style.visibility = 'hidden';
                    console.log('Area 2 Called');
                }

            });
            $("#area").trigger("change");
        });
    </script> --}}
    <script>
        // Shorthand for $( document ).ready()
        $(function() {
            $("#area").change(function() {

                var area = $("#area").val();
                // var area = document.getElementById('area');
                // var userInput = area.options[area.selectedIndex].value;

                if (area == 1) {
                    $('#entityDiv').show();
                    $('#entityDiv').show();
                    $('#regionDiv').show();
                    $('#locationDiv').show();
                    $('#nonPlantLocationDiv').hide();

                    // document.getElementById('entityDiv').style.visibility = 'visible';
                    // document.getElementById('nonPlantLocationDiv').style.visibility = 'hidden';

                    console.log('Area 1 Called');
                } else if (area == 2) {

                    $('#entityDiv').hide();
                    $('#regionDiv').hide();
                    $('#locationDiv').hide();
                    $('#nonPlantLocationDiv').show();

                    // document.getElementById('nonPlantLocationDiv').style.visibility = 'visible';
                    // document.getElementById('entityDiv').style.visibility = 'hidden';
                    // document.getElementById('regionDiv').style.visibility = 'hidden';
                    // document.getElementById('locationDiv').style.visibility = 'hidden';
                    console.log('Area 2 Called');
                }

            });

            $('#region_id').change(function() {
                console.log('change Called');
                var regionNcrId = $(this).val();

                console.log(regionNcrId);
                if (regionNcrId) {
                    $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'GET',
                        url: "{{ route('admin.nonconformity-reports.getLocationList') }}",
                        data: {
                            id: regionNcrId
                        },
                        success: function(data) {
                            // $('#location_ncr_id').html(
                            //     '<option value="">Select Location</option>');
                            // $.each(res, function(key, value) {
                            //     $('#location_ncr_id').append('<option value="' + value
                            //         .id + '">' + value.name + '</option>');
                            // });
                            // $('#region_ncr_id').html('<option value="">Select Locati</option>');

                            $('#location_ncr_id').empty();
                            $.each(data, function(key, value) {
                                $('#location_ncr_id').append('<option value="' + value
                                    .id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });

                } else {
                    $('#location_ncr_id').empty();
                }
            });

            $("#area2").change(function() {

                var area = $("#area2").val();
                // var area = document.getElementById('area');
                // var userInput = area.options[area.selectedIndex].value;

                if (area == 1) {
                    $('#entityDiv2').show();
                    $('#entityDiv2').show();
                    $('#regionDiv2').show();
                    $('#locationDiv2').show();
                    $('#nonPlantLocationDiv2').hide();

                    // document.getElementById('entityDiv').style.visibility = 'visible';
                    // document.getElementById('nonPlantLocationDiv').style.visibility = 'hidden';

                    console.log('Area 1 Called');
                } else if (area == 2) {

                    $('#entityDiv2').hide();
                    $('#regionDiv2').hide();
                    $('#locationDiv2').hide();
                    $('#nonPlantLocationDiv2').show();

                    // document.getElementById('nonPlantLocationDiv').style.visibility = 'visible';
                    // document.getElementById('entityDiv').style.visibility = 'hidden';
                    // document.getElementById('regionDiv').style.visibility = 'hidden';
                    // document.getElementById('locationDiv').style.visibility = 'hidden';
                    console.log('Area 2 Called');
                }

            });

            $('#region_id2').change(function() {
                console.log('change Called');
                var regionNcrId = $(this).val();

                console.log(regionNcrId);
                if (regionNcrId) {
                    $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'GET',
                        url: "{{ route('admin.nonconformity-reports.getLocationList') }}",
                        data: {
                            id: regionNcrId
                        },
                        success: function(data) {
                            // $('#location_ncr_id').html(
                            //     '<option value="">Select Location</option>');
                            // $.each(res, function(key, value) {
                            //     $('#location_ncr_id').append('<option value="' + value
                            //         .id + '">' + value.name + '</option>');
                            // });
                            // $('#region_ncr_id').html('<option value="">Select Locati</option>');

                            $('#location_ncr_id2').empty();
                            $.each(data, function(key, value) {
                                $('#location_ncr_id').append('<option value="' + value
                                    .id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });

                } else {
                    $('#location_ncr_id').empty();
                }
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#region_id2').change(function() {
                console.log('change Called');
                var regionNcrId = $(this).val();

                console.log(regionNcrId);
                if (regionNcrId) {
                    $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'GET',
                        url: "{{ route('admin.nonconformity-reports.getLocationList') }}",
                        data: {
                            id: regionNcrId
                        },
                        success: function(data) {

                            $('#location_ncr_id2').empty();
                            $.each(data, function(key, value) {
                                $('#location_ncr_id2').append('<option value="' + value
                                    .id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });

                } else {
                    $('#location_ncr_id2').empty();
                }
            });

        });
    </script> --}}
@endsection

@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.edit') }} {{ trans('cruds.nonConformityReport.title_singular') }}
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.nonconformity-reports.update', [$nonConformity->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group {{ $errors->has('no_laporan') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="no_laporan">{{ trans('cruds.nonConformityReport.fields.no_laporan') }}</label>
                                <input class="form-control" type="text" name="no_laporan" id="no_laporan"
                                    value="{{ old('no_laporan', $nonConformity->no_laporan) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.no_laporan_helper') }}</span>
                            </div>




                            <div class="form-group {{ $errors->has('root_cause') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="root_cause_id">{{ trans('cruds.nonConformityReport.fields.ncr_issue') }}</label>
                                <select class="form-control select2" name="root_cause_id" id="root_cause_id" disabled>
                                    @foreach ($root_causes as $id => $root_cause)
                                        <option value="{{ $id }}"
                                            {{ ($nonConformity->root_cause ? $nonConformity->root_cause->id : old('root_cause_id')) == $id ? 'selected' : '' }}>
                                            {{ $root_cause }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.ncr_issue_helper') }}</span>
                            </div>


                            {{-- <div class="form-group {{ $errors->has('root_cause') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="root_cause">{{ trans('cruds.nonConformityReport.fields.ncr_issue') }}</label>
                                <input class="form-control" type="text" name="root_cause" id="root_cause"
                                    value="{{ old('root_cause', $nonConformity->root_cause->name) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.ncr_issue_helper') }}</span>
                            </div>
 --}}

                            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="area_id">{{ trans('cruds.nonConformityReport.fields.area') }}</label>
                                <select class="form-control select2" name="area_id" id="area_id" disabled>
                                    @foreach ($area_incidents as $id => $area)
                                        <option value="{{ $id }}"
                                            {{ ($nonConformity->area ? $nonConformity->area->id : old('area_id')) == $id ? 'selected' : '' }}>
                                            {{ $area }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.nonConformityReport.fields.area_helper') }}</span>
                            </div>





                            {{-- <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="area">{{ trans('cruds.nonConformityReport.fields.area') }}</label>
                                <input class="form-control" type="text" name="area" id="area"
                                    value="{{ old('area', $nonConformity->area->name) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.nonConformityReport.fields.area_helper') }}</span>
                            </div> --}}





                            {{-- <div class="form-group {{ $errors->has('nonConformity') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="entity">{{ trans('cruds.nonConformityReport.fields.entity') }}</label>
                                <input class="form-control" type="text" name="entity" id="entity"
                                    value="{{ old('entity', $nonConformity->entity->name) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.entity_helper') }}</span>
                            </div>
 --}}


                            <div class="form-group {{ $errors->has('entity') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="entity_id">{{ trans('cruds.nonConformityReport.fields.entity') }}</label>
                                <select class="form-control select2" name="entity_id" id="entity_id" disabled>
                                    @foreach ($entitys as $id => $entity)
                                        <option value="{{ $id }}"
                                            {{ ($nonConformity->entity ? $nonConformity->entity->id : old('entity_id')) == $id ? 'selected' : '' }}>
                                            {{ $entity }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.entity_helper') }}</span>
                            </div>





                            {{-- <div class="form-group {{ $errors->has('location_ncr_id') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="location_ncr_id">{{ trans('cruds.nonConformityReport.fields.location') }}</label>
                                <input class="form-control" type="text" name="location_ncr_id" id="location_ncr_id"
                                    value="{{ old('location_ncr_id', $nonConformity->location->name) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.location_helper') }}</span>
                            </div> --}}

                            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="location_ncr_id">{{ trans('cruds.nonConformityReport.fields.location') }}</label>
                                <select class="form-control select2" name="location_ncr_id" id="location_ncr_id" disabled>
                                    @foreach ($locations as $id => $location)
                                        <option value="{{ $id }}"
                                            {{ ($nonConformity->location ? $nonConformity->location->id : old('location_ncr_id')) == $id ? 'selected' : '' }}>
                                            {{ $location }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.location_helper') }}</span>
                            </div>




                            {{-- <div class="form-group {{ $errors->has('corrective') ? 'has-error' : '' }}">
                                <label for="corrective">{{ trans('cruds.nonConformityReport.fields.corrective') }}</label>
                                <input class="form-control" type="text" name="corrective" id="corrective"
                                    value="{{ old('corrective', $nonConformity->corrective) }}">
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.corrective_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('preventive') ? 'has-error' : '' }}">
                                <label for="preventive">{{ trans('cruds.nonConformityReport.fields.preventive') }}</label>
                                <input class="form-control" type="text" name="preventive" id="preventive"
                                    value="{{ old('preventive', $nonConformity->preventive) }}">
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.preventive_helper') }}</span>
                            </div> --}}
                            <div class="form-group {{ $errors->has('date_event') ? 'has-error' : '' }}">
                                <label for="date_incident"
                                    class="required">{{ trans('cruds.nonConformityReport.fields.date_event') }}</label>
                                <input class="form-control datetime" type="text" name="date_event" id="date_event"
                                    value="{{ old('date_event', $nonConformity->date_event) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('date_event') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.date_event_helper') }}</span>
                            </div>


                            {{-- <div class="form-group {{ $errors->has('date_incident') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="date_incident">{{ trans('cruds.myIncidentReport.fields.date_incident') }}</label>
                                <input class="form-control" type="text" name="date_incident" id="date_incident"
                                    value="{{ old('date_incident', $incidentReport->date_incident) }}" readonly>
                                @if ($errors->has('date_incident'))
                                    <span class="help-block" role="alert">{{ $errors->first('date_incident') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.myIncidentReport.fields.description_helper') }}</span>
                            </div> --}}



                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="description">{{ trans('cruds.nonConformityReport.fields.description') }}</label>
                                <input class="form-control" type="text" name="description" id="description"
                                    value="{{ old('description', $nonConformity->description) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.description_helper') }}</span>
                            </div>


                            @if ($nonConformity->result_id != 2 && auth()->user()->is_administrator2)
                                {{-- <div class="form-group {{ $errors->has('dept_designated') ? 'has-error' : '' }}">
                                    <label
                                        for="dept_designated_id">{{ trans('cruds.nonConformityReport.fields.dept_designated') }}</label>
                                    <select class="form-control select2" name="dept_designated_id" id="dept_designated_id">
                                        @foreach ($dept_designateds as $id => $dept_designated)
                                            <option value="{{ $id }}"
                                                {{ ($nonConformity->dept_designated ? $nonConformity->dept_designated->id : old('dept_designated_id')) == $id ? 'selected' : '' }}>
                                                {{ $dept_designated }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has(''))
                                        <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.nonConformityReport.fields.dept_designated_helper') }}</span>
                                </div> --}}



                                <div class="form-group {{ $errors->has('dept_designated') ? 'has-error' : '' }}">
                                    <label
                                        for="assigned_to_id">{{ trans('cruds.nonConformityReport.fields.assigned_to') }}</label>
                                    <select class="form-control select2" name="assigned_to_id" id="assigned_to_id">
                                        @foreach ($actioned_bys as $id => $actioned_by)
                                            <option value="{{ $id }}"
                                                {{ ($nonConformity->actioned_by ? $nonConformity->actioned_by->id : old('assigned_to_id')) == $id ? 'selected' : '' }}>
                                                {{ $actioned_by }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has(''))
                                        <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.nonConformityReport.fields.assigned_to_helper') }}</span>
                                </div>
                            @endif

                            @if (auth()->user()->is_administrator2 && $nonConformity->result_id == 2)
                                <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                                    <label for="file"
                                        class="required">{{ trans('cruds.nonConformityReport.fields.verification_evidence') }}</label>
                                    <h5 style="color:red;">(Size Max. 3 MB)</h5>
                                    <div class="needsclick dropzone" id="file-dropzone">
                                    </div>

                                    @if ($errors->has('file'))
                                        <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.nonConformityReport.fields.verification_evidence_helper') }}</span>
                                </div>

                                <div class="form-group {{ $errors->has('done_at') ? 'has-error' : '' }}">
                                    <label
                                        for="date_action">{{ trans('cruds.nonConformityReport.fields.done_at') }}</label>
                                    <input class="form-control datetime" type="text" name="done_at" id="done_at"
                                        value="{{ old('done_at', $nonConformity->done_at) }}">
                                    @if ($errors->has('done_at'))
                                        <span class="help-block" role="alert">{{ $errors->first('done_at') }}</span>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.taskNonConformityReport.fields.date_action_helper') }}</span>
                                </div>
                            @endif

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
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let calculate
            $('#direct_cost').keyup(function(event) {
                var total = $('#direct_cost').val();
                if (total > 0 && total < 3000) {
                    var calculate = total * 4.5;
                } else if (total >= 3000 && total < 5000) {
                    var calculate = total * 1.6;
                } else if (total >= 5000 && total <= 9999) {
                    var calculate = total * 1.2;
                } else if (total >= 10000) {
                    var calculate = total * 1.1;
                }

                // var tot_price = total + (total * 0.18);
                var divobj = document.getElementById('copq');
                divobj.value = calculate;
            });
        });
    </script>



    <script>
        var uploadedFileMap = {}
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.task-nonconformity-reports.storeMedia') }}',
            maxFilesize: 3, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
                uploadedFileMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFileMap[file.name]
                }
                $('form').find('input[name="file[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($nonConformity) && $nonConformity->file)
                    var files =
                        {!! json_encode($nonConformity->file) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection

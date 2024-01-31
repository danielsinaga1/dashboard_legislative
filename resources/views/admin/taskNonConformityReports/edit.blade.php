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
                        <form method="POST"
                            action="{{ route('admin.task-nonconformity-reports.update', [$nonConformity->id]) }}"
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




                            {{-- <div class="form-group {{ $errors->has('root_cause') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="root_cause_id">{{ trans('cruds.nonConformityReport.fields.ncr_issue') }}</label>
                                <select class="form-control select2" name="root_cause_id" id="root_cause_id">
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
                            </div> --}}

                            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="area">{{ trans('cruds.nonConformityReport.fields.area') }}</label>
                                <input class="form-control" type="text" name="area" id="area"
                                    value="{{ old('area', $nonConformity->area->name) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.nonConformityReport.fields.area_helper') }}</span>
                            </div>

                            {{-- <div class="form-group {{ $errors->has('nonConformity') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="entity_id">{{ trans('cruds.nonConformityReport.fields.entity') }}</label>
                                <input class="form-control" type="text" name="entity_id" id="entity_id"
                                    value="{{ old('entity_id', $nonConformity->entity->id) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.entity_helper') }}</span>
                            </div> --}}


                            {{-- <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="location">{{ trans('cruds.nonConformityReport.fields.location') }}</label>
                                <input class="form-control" type="text" name="location" id="location"
                                    value="{{ old('location', $nonConformity->location->name) }}" readonly>
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.nonConformityReport.fields.location_helper') }}</span>
                            </div> --}}


                            <div class="form-group {{ $errors->has('root_cause') ? 'has-error' : '' }}">
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
                                <label
                                    for="date_incident">{{ trans('cruds.nonConformityReport.fields.date_event') }}</label>
                                <input class="form-control datetime" type="datetime" name="date_event" id="date_event"
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



                            <div class="form-group {{ $errors->has('corrective') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="corrective">{{ trans('cruds.taskNonConformityReport.fields.corrective') }}</label>
                                <input class="form-control" type="text" name="corrective" id="corrective"
                                    value="{{ old('corrective', $nonConformity->corrective) }}">
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.taskNonConformityReport.fields.corrective_helper') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('preventive') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="preventive">{{ trans('cruds.nonConformityReport.fields.preventive') }}</label>
                                <input class="form-control" type="text" name="preventive" id="preventive"
                                    value="{{ old('preventive', $nonConformity->preventive) }}">
                                @if ($errors->has(''))
                                    <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.taskNonConformityReport.fields.preventive_helper') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                                <label for="photos">{{ trans('cruds.taskNonConformityReport.fields.photos') }} <h5
                                        style="color:red;">(Size Max. 3 MB)</h5></label>
                                <div class="needsclick dropzone" id="photos-dropzone">
                                </div>
                                @if ($errors->has('photos'))
                                    <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.taskNonConformityReport.fields.photos_helper') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('date_action') ? 'has-error' : '' }}">
                                <label
                                    for="date_action">{{ trans('cruds.nonConformityReport.fields.date_action') }}</label>
                                <input class="form-control datetime" type="text" name="date_action" id="date_action"
                                    value="{{ old('date_action', $nonConformity->date_action) }}">
                                @if ($errors->has('date_action'))
                                    <span class="help-block" role="alert">{{ $errors->first('date_action') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.taskNonConformityReport.fields.date_action_helper') }}</span>
                            </div>

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
        var uploadedPhotosMap = {}
        Dropzone.options.photosDropzone = {
            url: '{{ route('admin.task-nonconformity-reports.storeMedia') }}',
            maxFilesize: 3, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 3,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
                uploadedPhotosMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotosMap[file.name]
                }
                $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($nonConformity) && $nonConformity->photos)
                    var files =
                        {!! json_encode($nonConformity->photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
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

@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.incidentReport.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.incident-reports.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('root_cause') ? 'has-error' : '' }}">
                            <label class="required" for="root_cause_id">{{ trans('cruds.incidentReport.fields.basic_cause') }}</label>
                            <select class="form-control select2" name="root_cause_id" id="root_cause_id" required>
                                @foreach($root_causes as $id => $root_cause)
                                    <option value="{{ $id }}" {{ old('root_cause_id') == $id ? 'selected' : '' }}>{{ $root_cause }}</option>
                                @endforeach
                            </select>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.basic_cause_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label class="required" for="location">{{ trans('cruds.incidentReport.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', '') }}" required>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.incidentReport.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file">{{ trans('cruds.incidentReport.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label for="category_id">{{ trans('cruds.incidentReport.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('classify') ? 'has-error' : '' }}">
                            <label for="classify_id">{{ trans('cruds.incidentReport.fields.classify') }}</label>
                            <select class="form-control select2" name="classify_id" id="classify_id">
                                @foreach($classifies as $id => $classify)
                                    <option value="{{ $id }}" {{ old('classify_id') == $id ? 'selected' : '' }}>{{ $classify }}</option>
                                @endforeach
                            </select>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.classify_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('perbaikan') ? 'has-error' : '' }}">
                            <label for="perbaikan">{{ trans('cruds.incidentReport.fields.perbaikan') }}</label>
                            <input class="form-control" type="text" name="perbaikan" id="perbaikan" value="{{ old('perbaikan', '') }}">
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.perbaikan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pencegahan') ? 'has-error' : '' }}">
                            <label for="pencegahan">{{ trans('cruds.incidentReport.fields.pencegahan') }}</label>
                            <input class="form-control" type="text" name="pencegahan" id="pencegahan" value="{{ old('pencegahan', '') }}">
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.pencegahan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_incident') ? 'has-error' : '' }}">
                            <label for="date_incident">{{ trans('cruds.incidentReport.fields.date_incident') }}</label>
                            <input class="form-control datetime" type="text" name="date_incident" id="date_incident" value="{{ old('date_incident') }}">
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.date_incident_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label class="required" for="description">{{ trans('cruds.incidentReport.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dept_designated') ? 'has-error' : '' }}">
                            <label for="dept_designated_id">{{ trans('cruds.incidentReport.fields.dept_designated') }}</label>
                            <select class="form-control select2" name="dept_designated_id" id="dept_designated_id">
                                @foreach($dept_designateds as $id => $dept_designated)
                                    <option value="{{ $id }}" {{ old('dept_designated_id') == $id ? 'selected' : '' }}>{{ $dept_designated }}</option>
                                @endforeach
                            </select>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.dept_designated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_action') ? 'has-error' : '' }}">
                            <label for="date_action">{{ trans('cruds.incidentReport.fields.date_action') }}</label>
                            <input class="form-control datetime" type="text" name="date_action" id="date_action" value="{{ old('date_action') }}">
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.date_action_helper') }}</span>
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
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.incident-reports.storeMedia') }}',
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
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
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
    init: function () {
@if(isset($incidentReport) && $incidentReport->photos)
      var files =
        {!! json_encode($incidentReport->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
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
<script>
    var uploadedFileMap = {}
Dropzone.options.fileDropzone = {
    url: '{{ route('admin.incident-reports.storeMedia') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
      uploadedFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileMap[file.name]
      }
      $('form').find('input[name="file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($incidentReport) && $incidentReport->file)
          var files =
            {!! json_encode($incidentReport->file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
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
@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.taskIncidentReport.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.task-incident-reports.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label class="required" for="location">{{ trans('cruds.taskIncidentReport.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', '') }}" required>
                            @if($errors->has('location'))
                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.taskIncidentReport.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file">{{ trans('cruds.taskIncidentReport.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incidentReport.fields.file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('perbaikan') ? 'has-error' : '' }}">
                            <label for="perbaikan">{{ trans('cruds.taskIncidentReport.fields.perbaikan') }}</label>
                            <input class="form-control" type="text" name="perbaikan" id="perbaikan" value="{{ old('perbaikan', '') }}">
                            @if($errors->has('perbaikan'))
                                <span class="help-block" role="alert">{{ $errors->first('perbaikan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.perbaikan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pencegahan') ? 'has-error' : '' }}">
                            <label for="pencegahan">{{ trans('cruds.taskIncidentReport.fields.pencegahan') }}</label>
                            <input class="form-control" type="text" name="pencegahan" id="pencegahan" value="{{ old('pencegahan', '') }}">
                            @if($errors->has('pencegahan'))
                                <span class="help-block" role="alert">{{ $errors->first('pencegahan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.pencegahan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_incident') ? 'has-error' : '' }}">
                            <label for="date_incident">{{ trans('cruds.taskIncidentReport.fields.date_incident') }}</label>
                            <input class="form-control datetime" type="text" name="date_incident" id="date_incident" value="{{ old('date_incident') }}">
                            @if($errors->has('date_incident'))
                                <span class="help-block" role="alert">{{ $errors->first('date_incident') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.date_incident_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label class="required" for="description">{{ trans('cruds.taskIncidentReport.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_action') ? 'has-error' : '' }}">
                            <label for="date_action">{{ trans('cruds.taskIncidentReport.fields.date_action') }}</label>
                            <input class="form-control datetime" type="text" name="date_action" id="date_action" value="{{ old('date_action') }}">
                            @if($errors->has('date_action'))
                                <span class="help-block" role="alert">{{ $errors->first('date_action') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.date_action_helper') }}</span>
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
    url: '{{ route('admin.task-incident-reports.storeMedia') }}',
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
    url: '{{ route('admin.task-incident-reports.storeMedia') }}',
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
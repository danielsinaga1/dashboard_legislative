@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.myIncidentReport.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.my-incident-reports.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                            <label for="area" class="required">{{ trans('cruds.myIncidentReport.fields.area') }}</label>
                            <select name="area_id" id="area" class="form-control select2" required>
                                @foreach($area_incidents as $id => $area_incident)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->area ? $incidentReport->area->id : old('area_id')) == $id ? 'selected' : '' }}>
                                    {{ $area_incident }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area_id'))
                            <p class="help-block">
                                {{ $errors->first('area_id') }}
                            </p>
                            @endif
                        </div>

                        @if(auth()->user()->npk == 2101386 || auth()->user()->npk == 2002192)
                         <div class="form-group {{ $errors->has('ri_id') ? 'has-error' : '' }}" id="otherFieldDiv">
                            <label for="region">{{ trans('cruds.myIncidentReport.fields.region') }}</label>
                            <select name="ri_id" id="area" class="form-control select2">
                                @foreach($region_incidents as $id => $region_incident)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->region ? $incidentReport->region->id : old('ri_id')) == $id ? 'selected' : '' }}>
                                    {{ $region_incident }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ri_id'))
                            <p class="help-block">
                                {{ $errors->first('ri_id') }}
                            </p>
                            @endif
                         </div>
                        @endif
                        
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label class="required" for="location">{{ trans('cruds.myIncidentReport.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', '') }}" maxlength = "40">
                            @if($errors->has('location'))
                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.myIncidentReport.fields.location_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('date_incident') ? 'has-error' : '' }}">
                            <label for="date_accident">{{ trans('cruds.myIncidentReport.fields.date_incident') }}</label>   
                                <input class="form-control datetime" type="text" name="date_incident" id="date_incident" value="{{ old('date_incident') }}">
                                 @if($errors->has('date_incident'))
                                    <span class="help-block" role="alert">{{ $errors->first('date_incident') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.myIncidentReport.fields.date_incident_helper') }}</span>

                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.myIncidentReport.fields.photos') }} <h5 style="color:red;">(Size Max. 3 MB)</h5></label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.myIncidentReport.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('root_cause_id') ? 'has-error' : '' }}">
                            <label for="root_cause">{{ trans('cruds.myIncidentReport.fields.basic_cause') }}*</label>
                            <select name="root_cause_id" id="root_cause" class="form-control select2" required>
                                @foreach($root_causes as $id => $root_cause)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->root_cause ? $incidentReport->root_cause->id : old('root_cause_id')) == $id ? 'selected' : '' }}>
                                    {{ $root_cause }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('root_cause_id'))
                            <p class="help-block">
                                {{ $errors->first('root_cause_id') }}
                            </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('perbaikan_awal') ? 'has-error' : '' }}">
                            <label for="perbaikan_awal">{{ trans('cruds.myIncidentReport.fields.awal_perbaikan') }}</label>
                            <input class="form-control" type="text" name="perbaikan_awal" id="perbaikan_awal" value="{{ old('perbaikan_awal', '') }}" maxlength = "40">
                            @if($errors->has('perbaikan_awal'))
                                <span class="help-block" role="alert">{{ $errors->first('perbaikan_awal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.myIncidentReport.fields.awal_perbaikan_helper') }}</span>
                        </div>
                        

                        <div class="form-group {{ $errors->has('dept_designated_id') ? 'has-error' : '' }}">
                            <label for="dept_designation">{{ trans('cruds.myIncidentReport.fields.dept_designated') }}*</label>
                            <select name="dept_designated_id" id="dept_designation" class="form-control select2"
                                required>
                                @foreach($dept_designations as $id => $dept_designation)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->dept_designation ? $incidentReport->dept_designation->id : old('dept_designated_id')) == $id ? 'selected' : '' }}>
                                    {{ $dept_designation }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dept_designated_id'))
                            <p class="help-block">
                                {{ $errors->first('dept_designated_id') }}
                            </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label for="category">{{ trans('cruds.myIncidentReport.fields.category') }}*</label>
                            <select name="category_id" id="category" class="form-control select2" required>
                                @foreach($category_incidents as $id => $category)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->category_incident ? $incidentReport->category_incident->id : old('category_id')) == $id ? 'selected' : '' }}>
                                    {{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                            <p class="help-block">
                                {{ $errors->first('category_id') }}
                            </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('cr_id') ? 'has-error' : '' }}">
                            <label for="chemical">{{ trans('cruds.myIncidentReport.fields.chemical') }}*</label>
                            <select name="cr_id" id="chemical" class="form-control select2" required>
                                @foreach($chemical_releases as $id => $chemical)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->chemical ? $incidentReport->chemical->id : old('cr_id')) == $id ? 'selected' : '' }}>
                                    {{ $chemical }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cr_id'))
                            <p class="help-block">
                                {{ $errors->first('cr_id') }}
                            </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('classify_id') ? 'has-error' : '' }}">
                            <label for="classification">{{ trans('cruds.myIncidentReport.fields.classify') }}* </label>&nbsp; <a href="#"><span class="glyphicon glyphicon-eye-open" data-toggle="modal" data-placement="top" title="Matrix Table" data-target="#modalCart" data-original-title="Matrix Table"></span></a>
                            <select name="classify_id" id="classification" class="form-control select2" required>
                                @foreach($classification_incidents as $id => $classification)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->classify_incident ? $incidentReport->classify_incident->id : old('classify_id')) == $id ? 'selected' : '' }}>
                                    {{ $classification }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('classify_id'))
                            <p class="help-block">
                                {{ $errors->first('classify_id') }}
                            </p>
                            @endif
                        </div>
                        
                        <div class="form-group {{ $errors->has('file_initiator') ? 'has-error' : '' }}">
                            <label for="file_initiator">{{ trans('cruds.myIncidentReport.fields.file_initiator') }}</label>
                            <div class="needsclick dropzone" id="file_initiator-dropzone">
                            </div>
                            @if($errors->has('file_initiator'))
                                <span class="help-block" role="alert">{{ $errors->first('file_initiator') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.myIncidentReport.fields.file_initiator_helper') }}</span>
                        </div>

                        <!-- <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file" title="WR/etc">{{ trans('cruds.myIncidentReport.fields.file') }} <h5 style="color:red;">(Size Max. 3 MB)</h5></label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                            <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.myIncidentReport.fields.file_helper') }}</span>
                        </div> -->
                       
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label class="required" for="description">{{ trans('cruds.myIncidentReport.fields.description') }}</label>
                            <textarea name="description" id="description" cols="20" rows="5" id='reason' class="form-control" required></textarea>
                            <!-- {{-- <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}" onkeyup="
                            var start = this.selectionStart;
                            var end = this.selectionEnd;
                            this.value = this.value.toLowerCase();
                            this.setSelectionRange(start, end);
                          "> --}} -->
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.myIncidentReport.fields.description_helper') }}</span>
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
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="classInfo"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Table Matrix Incident Report</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
                <th><!-- Empty for the left top corner of the table --></th>
                @foreach($columns as $column)
                <th>{{ $column }}</th>
                @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $category_id => $columns)
            <tr>
                <td><strong>{{ $category_id }}</strong></td>
                @foreach($columns as $classification_id => $description)
                <td>{!! $description !!}</td>
                @endforeach
            </tr>
        @endforeach
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->
@endsection

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.my-incident-reports.storeMedia') }}',
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

    // transformFile: function(file, done) {
    //     const imageCompressor = new imageCompressor();

    //     imageCompressor.compress(file, {
    //         checkOrientation: true,

    //         maxWidth: 8192,
    //         maxHeight: 8192,

    //         quality: 0.6,

    //         convertSize: 0,
    //     }).
    //     then((result)=> {
    //         done(result)
    //     }).
    //     catch((err)=> {
    //         throw err
    //     })
    // },
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
    url: '{{ route('admin.my-incident-reports.storeMedia') }}',
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

<script>
    var uploadedFileInitiatorMap = {}
Dropzone.options.fileInitiatorDropzone = {
    url: '{{ route('admin.my-incident-reports.storeMedia') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file_initiator[]" value="' + response.name + '">')
      uploadedFileInitiatorMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileInitiatorMap[file.name]
      }
      $('form').find('input[name="file_initiator[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($incidentReport) && $incidentReport->file_initiator)
          var files =
            {!! json_encode($incidentReport->file_initiator) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file_initiator[]" value="' + file.file_name + '">')
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
<!-- <script>
    $(function() {
 $(".datetime").datepicker(
    {
        beforeShowDay: function(d) {
            var day = d.getDay();
            return [(day != 0 && day != 3)];
        }
    });
    });
   
</script> -->
<script>
     $('#date_incident').datetimepicker({
	        format: 'DD-MM-YYYY HH:mm:ss',
            maxDate: moment(),
        });
</script>

<script>
    $(document).ready(function () {
        $("#area").change(function () {
            if ($(this).val() == 1) {
                $('#otherFieldDiv').show();
            } else {
                $('#otherFieldDiv').hide();
            }
        });
        $("#area").trigger("change");
    });
    
</script>
@endsection
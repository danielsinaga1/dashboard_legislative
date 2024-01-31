@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.taskIncidentReport.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="{{ route("admin.task-incident-reports.update", [$incidentReport->id]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('no_laporan') ? 'has-error' : '' }}">
                            <label class="required"
                                for="no_laporan">{{ trans('cruds.myIncidentReport.fields.no_laporan') }}</label>
                            <input class="form-control" type="text" name="no_laporan" id="no_laporan"
                                value="{{ old('no_laporan', $incidentReport->no_laporan) }}" readonly>
                            @if($errors->has('no_laporan'))
                            <span class="help-block" role="alert">{{ $errors->first('no_laporan') }}</span>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.myIncidentReport.fields.description_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('nama_pelapor_id') ? 'has-error' : '' }}">
                            <label class="required"
                                for="nama_pelapor">{{ trans('cruds.myIncidentReport.fields.nama_pelapor') }}</label>
                            <input class="form-control" type="text" name="nama_pelapor" id="nama_pelapor"
                                value="{{ old('no_laporan', $incidentReport->nama_pelapor->name) }}" readonly>
                            @if($errors->has('nama_pelapor'))
                            <span class="help-block" role="alert">{{ $errors->first('nama_pelapor') }}</span>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.myIncidentReport.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                            <label for="area">{{ trans('cruds.taskIncidentReport.fields.area') }}*</label>
                            <select name="area_id" id="area" class="form-control select2" disabled>
                                @foreach($area_incidents as $id => $area)
                                <option value="{{ $id }}"
                                    {{ (isset($incidentReport) && $incidentReport->category ? $incidentReport->area->id : old('area')) == $id ? 'selected' : '' }}>
                                    {{ $area }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area_id'))
                            <p class="help-block">
                                {{ $errors->first('area_id') }}
                            </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label class="required"
                                for="location">{{ trans('cruds.taskIncidentReport.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location"
                                value="{{ old('location', $incidentReport->location) }}" readonly>
                            @if($errors->has('location'))
                            <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.taskIncidentReport.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_incident') ? 'has-error' : '' }}">
                            <label class="required"
                                for="date_incident">{{ trans('cruds.myIncidentReport.fields.date_incident') }}</label>
                            <input class="form-control" type="text" name="date_incident" id="date_incident"
                                value="{{ old('date_incident', $incidentReport->date_incident) }}" readonly>
                            @if($errors->has('date_incident'))
                            <span class="help-block" role="alert">{{ $errors->first('date_incident') }}</span>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.myIncidentReport.fields.description_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('cr_id') ? 'has-error' : '' }}">
                            <label for="chemical">{{ trans('cruds.myIncidentReport.fields.chemical') }}*</label>
                            <select name="cr_id" id="chemical" class="form-control select2" disabled>
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
                        <div class="form-group {{ $errors->has('perbaikan_awal') ? 'has-error' : '' }}">
                            <label class="required"
                                for="perbaikan_awal">{{ trans('cruds.taskIncidentReport.fields.awal_perbaikan') }}</label>
                            <input class="form-control" type="text" name="description" id="perbaikan_awal"
                                value="{{ old('perbaikan_awal', $incidentReport->perbaikan_awal) }}" readonly>
                            @if($errors->has('perbaikan_awal'))
                            <span class="help-block" role="alert">{{ $errors->first('perbaikan_awal') }}</span>
                            @endif
                            <span
                                class="help-block">{{ trans('cruds.taskIncidentReport.fields.awal_perbaikan_helper') }}</span>
                        </div>
                        {{-- <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                        <label for="photos">{{ trans('cruds.taskIncidentReport.fields.photos') }}</label>
                        <div class="needsclick dropzone" id="photos-dropzone" disabled>
                        </div>
                        @if($errors->has('photos'))
                        <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.photos_helper') }}</span>
                </div> --}}
                {{-- <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                <label for="file">{{ trans('cruds.taskIncidentReport.fields.file') }}</label>
                <div class="needsclick dropzone" id="file-dropzone" disabled>
                </div>
                @if($errors->has('file'))
                <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.file_helper') }}</span>
            </div> --}}
            <div class="form-group {{ $errors->has('root_cause_id') ? 'has-error' : '' }}">
                <label for="root_cause">{{ trans('cruds.myIncidentReport.fields.basic_cause') }}*</label>
                <select name="root_cause_id" id="root_cause" class="form-control select2" disabled>
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
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category">{{ trans('cruds.taskIncidentReport.fields.category') }}*</label>
                <select name="category_id" id="category" class="form-control select2" disabled>
                    @foreach($category_incidents as $id => $category)
                    <option value="{{ $id }}"
                        {{ (isset($incidentReport) && $incidentReport->category ? $incidentReport->category->id : old('category_id')) == $id ? 'selected' : '' }}>
                        {{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                <p class="help-block">
                    {{ $errors->first('category_id') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('classify_id') ? 'has-error' : '' }}">
                <label for="classification">{{ trans('cruds.taskIncidentReport.fields.classify') }}*</label>
                <select name="classify_id" id="classify" class="form-control select2" disabled>
                    @foreach($classification_incidents as $id => $classification)
                    <option value="{{ $id }}"
                        {{ (isset($incidentReport) && $incidentReport->classify ? $incidentReport->classify->id : old('classify_id')) == $id ? 'selected' : '' }}>
                        {{ $classification }}</option>
                    @endforeach
                </select>
                @if($errors->has('classify_id'))
                <p class="help-block">
                    {{ $errors->first('classify_id') }}
                </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}" hidden>
                <label for="photos">{{ trans('cruds.myIncidentReport.fields.photos') }}</label>
                <div class="needsclick dropzone" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.myIncidentReport.fields.photos_helper') }}</span>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label class="required"
                    for="description">{{ trans('cruds.taskIncidentReport.fields.description') }}</label>
                <input class="form-control" type="text" name="description" id="description"
                    value="{{ old('description', $incidentReport->description) }}" readonly>
                @if($errors->has('description'))
                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.description_helper') }}</span>
            </div>
            <div class="form-group {{ $errors->has('file_initiator') ? 'has-error' : '' }}" hidden>
                <label for="file_initiator">{{ trans('cruds.myIncidentReport.fields.file_initiator') }}</label>
                <div class="needsclick dropzone" id="file_initiator-dropzone">
                </div>
                @if($errors->has('file_initiator'))
                <span class="help-block" role="alert">{{ $errors->first('file_initiator') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.myIncidentReport.fields.file_initiator_helper') }}</span>
            </div>

        @if (auth()->user()->is_manager)
            <div class="form-group">
                <label for="action_by_id">{{ trans('cruds.taskIncidentReport.fields.action_by') }}</label>
                <select class="form-control select2 {{ $errors->has('action_by') ? 'is-invalid' : '' }}"
                    name="action_by_id" id="action_by_id">
                    @foreach($actioned_bys as $id => $action_by)
                    <option value="{{ $id }}"
                        {{ ($incidentReport->action_by ? $incidentReport->action_by->id : old('action_by_id')) == $id ? 'selected' : '' }}>
                        {{ $action_by }}</option>
                    @endforeach
                </select>
                @if($errors->has(''))
                <span class="text-danger">{{ $errors->first('') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.assigned_to_helper') }}</span>
            </div>
        @elseif(auth()->user()->is_initiator || auth()->user()->is_superintendent || auth()->user()->is_administrator || auth()->user()->is_administrator2)
            @if ($incidentReport->classify->id == 1 || $incidentReport->classify->id == 2)
                <div class="form-group {{ $errors->has('perbaikan') ? 'has-error' : '' }}">
                    <label for="perbaikan">{{ trans('cruds.incidentReport.fields.perbaikan') }}</label>
                    <input class="form-control" type="text" name="perbaikan" id="perbaikan"
                        value="{{ old('perbaikan', $incidentReport->perbaikan) }}">
                    @if($errors->has('perbaikan'))
                    <span class="help-block" role="alert">{{ $errors->first('perbaikan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.perbaikan_helper') }}</span>
                </div>

                <div class="form-group {{ $errors->has('pencegahan') ? 'has-error' : '' }}">
                    <label for="pencegahan">{{ trans('cruds.taskIncidentReport.fields.pencegahan') }}</label>
                    <input class="form-control" type="text" name="pencegahan" id="pencegahan"
                        value="{{ old('pencegahan', $incidentReport->pencegahan) }}">
                    @if($errors->has('pencegahan'))
                    <span class="help-block" role="alert">{{ $errors->first('pencegahan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.pencegahan_helper') }}</span>
                </div>

                <div class="form-group {{ $errors->has('date_action') ? 'has-error' : '' }}">
                    <label for="date_action">{{ trans('cruds.taskIncidentReport.fields.date_action') }}</label>
                    <input class="form-control datetime" type="text" name="date_action" id="date_action"
                        value="{{ old('date_action', $incidentReport->date_action) }}">
                    @if($errors->has('date_action'))
                    <span class="help-block" role="alert">{{ $errors->first('date_action') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.date_action_helper') }}</span>
                </div>

                <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                    <label for="file">{{ trans('cruds.taskIncidentReport.fields.file') }}</label>
                    <h5 style="color:red;">(Size Max. 3 MB)</h5>
                    <div class="needsclick dropzone" id="file-dropzone">
                    </div>

                    @if($errors->has('file'))
                    <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.file_helper') }}</span>
                </div>
            @elseif($incidentReport->classify->id == 3 || $incidentReport->classify->id == 4 || $incidentReport->classify->id == 5)
                @if ($countInvestigation == 0)
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="panel panel-primary">
                            <div class="panel-heading clearfix">
                                {{ trans('cruds.investigationDetail.title') }}
                            </div>
                            <div class="panel-body">
                                <div style="margin-bottom: 10px;" class="row">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-success add-option">
                                            {{ trans('global.add') }}
                                            {{ trans('cruds.investigationDetail.title_singular') }}
                                        </button>
                                    </div>
                                </div>

                                <table class="table table-bordered table-striped table-hover options">
                                    <thead>
                                        <tr>
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
                                                {{ trans('cruds.investigationDetail.fields.precortive') }}
                                            </th>

                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(old('recommendations', ['']) as $key => $oldInvestigation)
                                        <tr>
                                            <td>
                                                <input type="text" name="recommendations[{{ $loop->index }}]" class="form-control required" id="recommendation" value="{{ $oldInvestigation }}" />
                                            </td>
                                            <td>
                                                <select class="form-control {{ $errors->has('picInvestigation') ? 'is-invalid' : '' }}" name="pics[]" id="pic_id">
                                                    @foreach($pics as $id => $pic)
                                                    <option value="{{ $id }}" {{ ($investigationDetail->picInvestigation ? $incidentReport->picInvestigation->id : old('pic_id.' . $key)) == $id ? 'selected' : '' }}>
                                                        {{ $pic }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <input class="form-control" type="datetime-local" name="date_deadlines[]" id="date_deadline" value="{{ old('date_deadline.' . $key) }}">
                                            </td>

                                            <td>
                                                <select
                                                    class="form-control {{ $errors->has('precortiveInvestigation') ? 'is-invalid' : '' }}" name="precortives[]" id="precortive_id">
                                                    @foreach($precortives as $id => $precortive)
                                                    <option value="{{ $id }}"
                                                        {{ ($investigationDetail->precortiveInvestigation ? $investigationDetail->precortiveInvestigation->id : old('precortive_id.' . $key)) == $id ? 'selected' : '' }}>
                                                        {{ $precortive }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-xs btn-danger delete-option">
                                                    {{ trans('global.delete') }}
                                                </button>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                @else         
                    @if ($countStatusInvestigation == 0)
                        <div class="form-group {{ $errors->has('date_action') ? 'has-error' : '' }}">
                            <label for="date_action">{{ trans('cruds.taskIncidentReport.fields.date_action') }}</label>
                            <input class="form-control datetime" type="text" name="date_action" id="date_action"
                                value="{{ old('date_action', $incidentReport->date_action) }}">
                            @if($errors->has('date_action'))
                            <span class="help-block" role="alert">{{ $errors->first('date_action') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.taskIncidentReport.fields.date_action_helper') }}</span>
                        </div>
                    @endif
               
                @endif
                          
                

            @endif
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
    $(function () {
        let $options = $('table.options tbody');
        let index = $options.find('tr').length;
    
        $('.add-option').click(function (e) {
            e.preventDefault();
            if ($options.find('tr:last input[type="text"]').val()) {
                let $newRow = $options.find('tr:last').clone();
                $newRow.find('#recommendation').prop({
                    value: '',
                    name: 'recommendations[' + index + ']',
                    required : true,
                });
                // $newRow.find('#status').prop({
                //     value: '',
                //     name: 'statuses[' + index + ']'
                // });
                $newRow.find('#date_deadline').prop({
                    value: '',
                    name: 'date_deadlines[' + index + ']',
                    required : true,
                });
                
                $newRow.find('#pic').prop({
                    value: '',
                    name: 'pics[' + index + ']'
                });

                // $newRow.find('td input[type="checkbox"]').prop({
                //     checked: false,
                //     name: 'is_correct[' + index + ']'
                // });
                index++;
                $newRow.appendTo($options);
            }
        });
    
        $options.on('click', '.delete-option', function (e) {
            e.preventDefault();
            if ($options.find('tr').length > 1) {
                $(this).closest('tr').remove();
            }
        });
    });
</script>

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
    url: '{{ route('admin.task-incident-reports.storeMedia') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
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
{{-- <script>
    $('#date_deadline').datetimepicker({
           format: 'DD-MM-YYYY H:mm',
       });
</script> --}}

{{-- <script>
    $(document).ready(function(){
        // let row_number = 4;
        let row_number = {{ old('incidentReports') }};
    
      $("#add_row").click(function(e){
        e.preventDefault();
        let new_row_number = row_number - 1;
        $('#incidentReport' + row_number).html($('#incidentReport' + new_row_number).html()).find('td:first-child');
        $('#incidentReports_table').append('<tr id="incidentReport' + (row_number + 1) + '"></tr>');
        row_number++;
      });

      $("#delete_row").click(function(e){
        e.preventDefault();
        if(row_number > 1){
          $("#incidentReport" + (row_number - 1)).html('');
          row_number--;
        }
      });
    });
  </script> --}}

{{-- <script>
    $(function () {
        let $investigations = $('table.investigations tbody');
        let index = $investigations.find('tr').length;
    
        $('.add-investigation').click(function (e) {
            e.preventDefault();
            if ($investigations.find('tr:last input[type="text"]').val()) {
                let $newRow = $investigations.find('tr:last').clone();
                $newRow.find('td input[type="text"]').prop({
                    value: '',
                    name: 'recommendations[' + index + ']'
                });
                $newRow.find('td input[type="text"]').prop({
                    value: '',
                    name: 'statuses[' + index + ']'
                });
                index++;
                $newRow.appendTo($investigations);
            }
        });
    
        $investigations.on('click', '.delete-investigation', function (e) {
            e.preventDefault();
            if ($investigations.find('tr').length > 1) {
                $(this).closest('tr').remove();
            }
        });
    });
    </script> --}}


@endsection


@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.investigationDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.investigation-details.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('recommendation') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.investigationDetail.fields.recommendation') }}</label>
                            <textarea class="form-control ckeditor" name="recommendation" id="recommendation">{!! old('recommendation') !!}</textarea>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investigationDetail.fields.recommendation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('picInvestigation') ? 'has-error' : '' }}">
                            <label for="pic_id">{{ trans('cruds.investigationDetail.fields.pic') }}</label>
                            <select class="form-control select2" name="pic_id" id="pic_id">
                                @foreach($pics as $id => $picInvestigation)
                                    <option value="{{ $id }}" {{ old('pic_id') == $id ? 'selected' : '' }}>{{ $picInvestigation }}</option>
                                @endforeach
                            </select>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investigationDetail.fields.pic_helper') }}</span>
                        </div>
{{-- 
                        <div class="form-group {{ $errors->has('deadline') ? 'has-error' : '' }}">
                          <label for="deadline">{{ trans('cruds.classificationDistribution.fields.deadline') }}</label>   
                              <input class="form-control datetime" type="text" name="deadline" id="deadline" value="{{ old('deadline') }}">
                               @if($errors->has('deadline'))
                                  <span class="help-block" role="alert">{{ $errors->first('deadline') }}</span>
                                  @endif
                                  <span class="help-block">{{ trans('cruds.classificationDistribution.fields.deadline_helper') }}</span>

                      </div> --}}
                      <div class="form-group {{ $errors->has('deadline') ? 'has-error' : '' }}">
                        <label for="deadline">{{ trans('cruds.investigationDetail.fields.deadline') }}</label>   
                            <input class="form-control datetime" type="text" name="deadline" id="deadline" value="{{ old('deadline') }}">
                             @if($errors->has('deadline'))
                                <span class="help-block" role="alert">{{ $errors->first('deadline') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.investigationDetail.fields.deadline_helper') }}</span>

                    </div>
                        {{-- <div class="form-group {{ $errors->has('classification') ? 'has-error' : '' }}">
                            <label for="classification_id">{{ trans('cruds.classificationDistribution.fields.classification') }}</label>
                            <select class="form-control select2" name="classification_id" id="classification_id">
                                @foreach($classifications as $id => $classification)
                                    <option value="{{ $id }}" {{ old('classification_id') == $id ? 'selected' : '' }}>{{ $classification }}</option>
                                @endforeach
                            </select>
                            @if($errors->has(''))
                                <span class="help-block" role="alert">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.classificationDistribution.fields.classification_helper') }}</span>
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
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/investigation-details/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $classificationDistribution->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
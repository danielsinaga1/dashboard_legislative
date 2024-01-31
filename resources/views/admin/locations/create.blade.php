@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.create') }} {{ trans('cruds.location.title_singular') }}
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.locations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="required" for="name">{{ trans('cruds.location.fields.name') }}</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name', '') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.location.fields.name_helper') }}</span>
                            </div>


                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="required"
                                    for="region_ncr_id">{{ trans('cruds.location.fields.region') }}</label>
                                <select class="form-control select2" name="region_ncr_id" id="region_ncr_id" required>
                                    @foreach ($region_ncrs as $id => $region_ncr)
                                        <option value="{{ $id }}"
                                            {{ ($location->region ? $location->region->id : old('region_ncr_id')) == $id ? 'selected' : '' }}>
                                            {{ $region_ncr }}</option>
                                    @endforeach
                                </select>
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

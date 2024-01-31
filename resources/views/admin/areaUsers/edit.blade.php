@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.areaUser.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.area-users.update", [$areaUser->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                            <label for="user">{{ trans('cruds.areaUser.fields.user') }}*</label>
                            <select name="user_id" id="area" class="form-control select2" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (isset($areaUser) && $areaUser->user ? $areaUser->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_id'))
                                <p class="help-block">
                                    {{ $errors->first('user_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('area_id') ? 'has-error' : '' }}">
                            <label for="area">{{ trans('cruds.areaUser.fields.area') }}*</label>
                            <select name="area_id" id="area" class="form-control select2" required>
                                @foreach($area_incidents as $id => $area)
                                    <option value="{{ $id }}" {{ (isset($areaUser) && $areaUser->area ? $areaUser->area->id : old('area_id')) == $id ? 'selected' : '' }}>{{ $area }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area_id'))
                                <p class="help-block">
                                    {{ $errors->first('area_id') }}
                                </p>
                            @endif
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
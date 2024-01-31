<?php

namespace App\Http\Controllers\Admin;

use App\CategoryIncident;
use App\ClassificationDetail;
use App\ClassificationIncident;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClassificationDetailRequest;
use App\Http\Requests\StoreClassificationDetailRequest;
use App\Http\Requests\UpdateClassificationDetailRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ClassificationDetailController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('classification_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classificationDetails = ClassificationDetail::all();

        return view('admin.classificationDetails.index', compact('classificationDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('classification_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classifications = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.classificationDetails.create', compact('categories', 'classifications'));
    }

    public function store(StoreClassificationDetailRequest $request)
    {
        $classificationDetail = ClassificationDetail::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $classificationDetail->id]);
        }

        return redirect()->route('admin.classification-details.index');
    }

    public function edit(ClassificationDetail $classificationDetail)
    {
        abort_if(Gate::denies('classification_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classifications = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classificationDetail->load('category', 'classification');

        return view('admin.classificationDetails.edit', compact('categories', 'classifications', 'classificationDetail'));
    }

    public function update(UpdateClassificationDetailRequest $request, ClassificationDetail $classificationDetail)
    {
        $classificationDetail->update($request->all());

        return redirect()->route('admin.classification-details.index');
    }

    public function show(ClassificationDetail $classificationDetail)
    {
        abort_if(Gate::denies('classification_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classificationDetail->load('category', 'classification');

        return view('admin.classificationDetails.show', compact('classificationDetail'));
    }

    public function destroy(ClassificationDetail $classificationDetail)
    {
        abort_if(Gate::denies('classification_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classificationDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyClassificationDetailRequest $request)
    {
        ClassificationDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('classification_detail_create') && Gate::denies('classification_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ClassificationDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

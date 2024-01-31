<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClassificationDetail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreClassificationDetailRequest;
use App\Http\Requests\UpdateClassificationDetailRequest;
use App\Http\Resources\Admin\ClassificationDetailResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassificationDetailApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('classification_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClassificationDetailResource(ClassificationDetail::with(['category', 'classification'])->get());
    }

    public function store(StoreClassificationDetailRequest $request)
    {
        $classificationDetail = ClassificationDetail::create($request->all());

        return (new ClassificationDetailResource($classificationDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClassificationDetail $classificationDetail)
    {
        abort_if(Gate::denies('classification_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClassificationDetailResource($classificationDetail->load(['category', 'classification']));
    }

    public function update(UpdateClassificationDetailRequest $request, ClassificationDetail $classificationDetail)
    {
        $classificationDetail->update($request->all());

        return (new ClassificationDetailResource($classificationDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClassificationDetail $classificationDetail)
    {
        abort_if(Gate::denies('classification_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classificationDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

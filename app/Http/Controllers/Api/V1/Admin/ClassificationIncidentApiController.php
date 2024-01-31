<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClassificationIncident;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassificationIncidentRequest;
use App\Http\Requests\UpdateClassificationIncidentRequest;
use App\Http\Resources\Admin\ClassificationIncidentResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassificationIncidentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('classification_incident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClassificationIncidentResource(ClassificationIncident::all());
    }

    public function store(StoreClassificationIncidentRequest $request)
    {
        $classificationIncident = ClassificationIncident::create($request->all());

        return (new ClassificationIncidentResource($classificationIncident))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClassificationIncident $classificationIncident)
    {
        abort_if(Gate::denies('classification_incident_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClassificationIncidentResource($classificationIncident);
    }

    public function update(UpdateClassificationIncidentRequest $request, ClassificationIncident $classificationIncident)
    {
        $classificationIncident->update($request->all());

        return (new ClassificationIncidentResource($classificationIncident))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClassificationIncident $classificationIncident)
    {
        abort_if(Gate::denies('classification_incident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classificationIncident->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

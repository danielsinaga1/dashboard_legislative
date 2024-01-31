<?php

namespace App\Http\Requests;

use App\CategoryIncident;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoryIncidentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('category_incident_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}

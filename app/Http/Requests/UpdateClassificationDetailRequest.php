<?php

namespace App\Http\Requests;

use App\ClassificationDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClassificationDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('classification_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description' => [
                'required',
            ],
        ];
    }
}

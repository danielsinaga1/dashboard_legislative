<?php

namespace App\Http\Requests;

use App\ClassificationDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreClassificationDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('classification_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

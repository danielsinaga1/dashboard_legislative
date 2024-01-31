<?php

namespace App\Http\Requests;

use App\OriginDepartment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOriginDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('origin_department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'code' => [
                'required',
            ],
        ];
    }
}

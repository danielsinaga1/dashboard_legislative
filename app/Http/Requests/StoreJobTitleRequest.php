<?php

namespace App\Http\Requests;

use App\JobTitle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobTitleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('job_title_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:job_titles',
            ],
        ];
    }
}

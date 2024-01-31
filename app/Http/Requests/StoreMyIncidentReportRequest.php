<?php

namespace App\Http\Requests;

use App\IncidentReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMyIncidentReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('my_incident_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date_incident' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'description'   => [
                'required',
            ],

            'location'   => [
                'required',
            ],

            'classify_id' => [
                'required',
                'integer',
            ],
            
            'category_id' => [
                'required',
                'integer',
            ],

            'cr_id' => [
                'required',
                'integer',
            ],

            'area_id' => [
                'required',
                'integer',
            ],

        ];
    }
}

<?php

namespace App\Http\Requests;

use App\IncidentReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIncidentReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('incident_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'root_cause_id' => [
                'required',
                'integer',
            ],
            'location'      => [
                'required',
            ],
            'date_incident' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'description'   => [
                'required',
            ],
            'date_action'   => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}

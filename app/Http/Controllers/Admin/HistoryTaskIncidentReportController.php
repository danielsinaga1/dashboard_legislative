<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\IncidentReport;
use App\DesignationDepartment;
use App\DistributionIncident;
use App\RootCause;
use Carbon\Carbon;
use DB;
use App\CategoryIncident;
use App\ClassificationIncident;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class HistoryTaskIncidentReportController extends Controller
{
    
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('history_task_incident_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $authId = auth()->user()->id;
        $authDeptId = auth()->user()->dept_id;

        if(auth()->user()->is_initiator || auth()->user()->is_administrator2){
            $incidentReports = IncidentReport::where('action_by_id', $authId)->where('status','Close')->get();    
        }

        elseif(auth()->user()->is_superintendent || auth()->user()->is_superadministrator || auth()->user()->is_administrator){
            $incidentReports = IncidentReport::where('action_by_id', $authId)->where('status', 'Close')->get();    
        }
        elseif(auth()->user()->is_manager){
            $incidentReports = IncidentReport::where('dept_designated_id', $authDeptId)->where('status', 'Close')->where('result_id','!=',3)->get();
        }
        elseif(auth()->user()->is_admin){
            $incidentReports = IncidentReport::all();
        }
        // $dataTask = IncidentReport::where('dept_designated_id', $authDeptId)->where('status','Open')->whereNotNull('acknowledged_by_id')->with('dept_designated')->get();
        // dd($dataTask);
        // $incidentReports = IncidentReport::all();

        return view('admin.historyTaskIncidentReports.index', compact('incidentReports'));
    }

    public function show(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('task_incident_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','area','action_by');

        $distribution_incidents = DistributionIncident::where('ir_id',$incidentReport->id)->get();

        return view('admin.historyTaskIncidentReports.show', compact('incidentReport','distribution_incidents'));
    }

}

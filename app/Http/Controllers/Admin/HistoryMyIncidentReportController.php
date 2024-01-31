<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IncidentReport;
use Carbon\Carbon;
use DB;
use App\DesignationDepartment;
use App\RootCause;
use App\CategoryIncident;
use App\ClassificationIncident;
use Gate;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HistoryMyIncidentReportController extends Controller
{
    
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('history_my_incident_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $authId = auth()->user()->id;
        $authDeptId = auth()->user()->dept_id;
        $now = Carbon::now();

        $from = DB::table('incident_reports')->
                where('id','1')->select('created_at')->get();

        $to = Carbon::createFromFormat('Y-m-d H:i:s',$now);

        $date1 = strtotime($from);  
        $date2 = strtotime($now);  
        $diff = abs($date2 - $date1);  
        // To get the year divide the resultant date into 
        // total seconds in a year (365*60*60*24) 
        $years = floor($diff / (365*60*60*24));  
          
        // To get the month, subtract it with years and 
        // divide the resultant date into 
        // total seconds in a month (30*60*60*24) 
        $months = floor(($diff - $years * 365*60*60*24) 
        / (30*60*60*24));  
        // Formulate the Difference between two dates 

        // $days = floor(($diff - $years * 365*60*60*24 -  
        //      $months*30*60*60*24)/ (60*60*24)); 
        
        if(auth()->user()->is_initiator  || auth()->user()->is_administrator2){
            $incidentReports = IncidentReport::where('nama_pelapor_id', $authId)->where('status', 'Close')->get();    
        }

        elseif(auth()->user()->is_superintendent || auth()->user()->is_superadministrator || auth()->user()->is_administrator) {
            
            $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                $query->where('parent_id',auth()->user()->id);
            })->where('status','Close')->get();
             
            // $incidentReports =IncidentReport::where('ri_id', 2)->where('status','Close')->get();
        }

        elseif(auth()->user()->is_manager){
            $incidentReports = IncidentReport::where('dept_origin_id', $authDeptId)->where('status', 'Close')->get();
        }
        elseif(auth()->user()->is_admin){
            $incidentReports = IncidentReport::all();
        }
        // $incidentReports = IncidentReport::all();
        // $dataSpdt = IncidentReport::where('dept_origin_id', $authDeptId)->where('result_id', 1)->with('dept_origin','result')->get();
        // $dataManager = IncidentReport::where('dept_origin_id', $authDeptId)->where('result_id', 2)->whereNotNull('reviewed_by_id')->with('dept_origin')->get();

        return view('admin.historyMyIncidentReports.index', compact('incidentReports'));
    }


    public function show(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('history_my_incident_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','action_by','area');

        return view('admin.historyMyIncidentReports.show', compact('incidentReport'));
    }


}

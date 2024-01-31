<?php

namespace App\Http\Controllers\Admin;
use App\ClassificationDetail;

use App\IncidentReport;
use App\IncidentReportNotification;

use App\OriginDepartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        // $countOpenCorrective = DB::table('incident_reports')->select('perbaikan')
        // ->where('status','Open')
        // ->where('perbaikan', '!=','NULL')->count();

        $countOpenCorrective = DB::table('incident_reports')->select('perbaikan')
        ->where('status','Open')
        ->where('deleted_at', NULL)
        ->where('action_by_id','!=','NULL')
        ->count();

        // $countCloseCorrective = DB::table('incident_reports')->select('perbaikan')
        // ->where('status','Close')
        // ->where('perbaikan', '!=','NULL')->count();

        $countCloseCorrective = DB::table('incident_reports')->select('perbaikan')
        ->where('status','Close')
        ->where('deleted_at', NULL)
        ->where('action_by_id', '!=','NULL')
        ->count();

        // $countOpenPreventive = DB::table('incident_reports')->select('pencegahan')
        // ->where('status','Open')
        // ->where('perbaikan', '!=','NULL')->count();

        $countOpenPreventive = DB::table('incident_reports')->select('pencegahan')
        ->where('status','Open')
        ->where('deleted_at', NULL)
        ->where('action_by_id', '!=','NULL')
        ->count();


        // $countClosePreventive = DB::table('incident_reports')->select('pencegahan')
        // ->where('status','Close')
        // ->where('perbaikan', '!=','NULL')->count();

        $countClosePreventive = DB::table('incident_reports')->select('pencegahan')
        ->where('status','Close')
        ->where('deleted_at', NULL)
        ->where('action_by_id', '!=','NULL')
        ->count();


        // $countPreventive = DB::table('incident_reports')->select('pencegahan')
        // ->where('pencegahan','!=','NULL')->count();

        $countPreventive = DB::table('incident_reports')->select('pencegahan')
        ->where('action_by_id','!=','NULL')
        ->where('deleted_at', NULL)
        ->count();

        // $countCorrective = DB::table('incident_reports')->select('perbaikan')
        // ->where('perbaikan','!=','NULL')->count();

        $countCorrective = DB::table('incident_reports')->select('perbaikan')
        ->where('action_by_id','!=','NULL')
        ->where('deleted_at', NULL)
        ->count();

        $countCloseCorrectivePreventive = $countCloseCorrective + $countClosePreventive;

        $countOpenCorrectivePreventive = $countOpenCorrective + $countOpenPreventive;

        $countCorrectivePreventive = $countPreventive + $countCorrective;

        $data2 = DB::table('incident_reports')
        ->join('category_incidents','incident_reports.category_id','category_incidents.id')
        ->select(DB::raw('name, count(*) as y'))
        ->groupBy('name')
        ->get();

       $dataCategory = DB::table('category_incidents')
        ->join('incident_reports','incident_reports.category_id','category_incidents.id')
        ->where('incident_reports.deleted_at',null)
        ->select(DB::raw('name, count(*) as y'))
        ->groupBy('name')
        ->get();

        $matrixs = ClassificationDetail::orderBy('classification_id')->orderBy('category_id')->get();
        $rows = [];
        $columns = [];
        // $arrayOrigins = array();
        // $arrayDesignations = array();
        // $arrayCategories = array();
        // $countDeptOrigins = array();
        // $countOpenDeptDesignations = array();
        // $countCloseDeptDesignations = array();
        // $countObligatoryInvestigations = array();
        // $countAlreadyInvestigations = array();
        // $countNotFinishedInvestigations = array();

        $arrayOrigins = [];
        $arrayDesignations = [];
        $arrayCategories = [];
        $countDeptOrigins = [];
        $countOpenDeptDesignations = [];
        $countCloseDeptDesignations = [];
        $countObligatoryInvestigations = [];
        $countAlreadyInvestigations = [];
        $countNotFinishedInvestigations = [];

        foreach ($matrixs as $index => $matrix) {
            // Create an empty a    rray if the key does not exist yet
            if(!isset($rows[$matrix->classification->name])) {
                $rows[$matrix->classification->name] = [];
            }

              // Add the column to the array of columns if it's not yet in there
            if(!in_array($matrix->category->name, $columns)) {
                $columns[] = $matrix->category->name;
            }
             // Add the grade to the 2 dimensional array
             $rows[$matrix->classification->name][$matrix->category->name] = $matrix->description;
        }

        $incidentReports = IncidentReport::with('dept_origin:id,code')->where('status','Open')->get();

        $deptFollowOrigins = DB::table('origin_departments')->select('origin_departments.*')->where('id','!=',10)->where('id','!=',11)->where('id','!=',12)->get()->toarray();

        $deptFollowDesignations = DB::table('designation_departments')->select('designation_departments.*')->get()->toarray();

        $categoryIncidents = DB::table('category_incidents')->select('category_incidents.*')->get()->toArray();

        // $investigationDetailsRequired = DB::table('incident_reports')->select('no_laporan','classify_id')->where('classify_id','!=',1)->where('classify_id','!=',2)->count();
        // IncidentReport::where('classify_id','!=',1)->where('classify_id','!=',2)->get();

        // dd($investigationDetailsRequired);


        $investigationDetailsDone = IncidentReport::where('result_id',6)->get()->count();

        $investigationDetailsApprovedFully = DB::table('incident_reports')->select('no_laporan')->where('result_id', 2)->get();


        //Array of Origin Department

        foreach($deptFollowOrigins as $deptFollowOrigin){
            $arrayOrigins[] = $deptFollowOrigin->code;
        }

        // $lengthArrayOrigins = count($arrayOrigins, 1);
        $lengthArrayOrigins = count($arrayOrigins, 1);

        array_push($arrayOrigins, "TOTAL");



        //Array of Designation Department

        foreach($deptFollowDesignations as $deptFollowDesignation){
            $arrayDesignations[] = $deptFollowDesignation->code;
        }

        // $lengthArrayDesignations = count((array)$arrayDesignations);
        $lengthArrayDesignations = count($arrayDesignations, 1);


        foreach($categoryIncidents as $categoryIncident){
            $arrayCategories[] = $categoryIncident->name;
        }

        // $lengthArrayCategories = count((array)$arrayCategories);
        $lengthArrayCategories = count($arrayCategories, 1);


        // foreach($incidentReports as $incidentReport){
        //     // $countReports[] = $incidentReport->dept_origin->code;
        //     if($incidentReport->dept_origin->code === 'GA&IT'){
        //         $deptGaIt[] = $incidentReport->dept_origin->code === 'GA&IT';
        //         $countGaIt = count($deptGaIt);
        //     }

        // foreach($incidentReports as $incidentReport){
        //     $array[] = $incidentReport->dept_origin->code;
        //     $counts = array_count_values($array);
        // }
        // $countGaIt = $counts['GA&IT'];


        for($i=1;$i<= $lengthArrayOrigins;$i++){
            $countDeptOrigins = IncidentReport::where('dept_origin_id',$i)->where('status','=','Open')->count();
        }

        for($i=1;$i<= $lengthArrayDesignations;$i++){
            $countOpenDeptDesignations = IncidentReport::where('dept_designated_id',$i)->where('status','=','Open')->count();
        }

        for($i=1;$i<= $lengthArrayDesignations;$i++){
            $countCloseDeptDesignations = IncidentReport::where('dept_designated_id',$i)->where('status','=','Close')->count();
        }

        //Wajib Dilakukan
        for($i=1;$i<= $lengthArrayCategories;$i++){
            $countObligatoryInvestigations = IncidentReport::where('category_id',$i)->where('classify_id','!=',1)->where('classify_id','!=',2)->where('result_id','!=',3)->count();

        }

        // //Sudah Dilakukan

        for($i=1;$i<= $lengthArrayCategories;$i++){
            $countAlreadyInvestigations = IncidentReport::where('category_id',$i)->where('result_id', 6)->where('classify_id','!=',1)->where('classify_id','!=',2)->count();
        }

        // //Belum Dilakukan
        for($i=1;$i<= $lengthArrayCategories;$i++){
            $totalCategoryInvestigationRequired = IncidentReport::where('category_id',$i)->where('classify_id','!=',1)->where('classify_id','!=',2)->where('result_id','!=',3)->count();
            $totalCategoryInvestigationDone = IncidentReport::where('category_id',$i)->where('result_id', 6)->where('classify_id','!=',1)->where('classify_id','!=',2)->count();

            // $countNotFinishedInvestigations[] = count(IncidentReport::where('category_id',$i)->where('result_id', 2)->get());
            $countNotFinishedInvestigations = $totalCategoryInvestigationRequired - $totalCategoryInvestigationDone;
        }

        $totalCloseReport = IncidentReport::where('status','=','Close')->count();
        $totalReport = IncidentReport::all()->count();
        $totalReportRejected = IncidentReport::where('result_id', 3)->count();
        $totalReportApproved = IncidentReport::where('result_id', 2)->count();
        $totalReportInProgress = IncidentReport::where('result_id', 5)->count();
        $totalReportApprovedAccumulative = $totalReportApproved + $totalReportInProgress + $totalCloseReport;
        $totalReportInProgressAccumulative = $totalReportApproved + $totalReportInProgress;
        $totalOpenReport = IncidentReport::where('status','=','Open')->count();


        //Investigasi Detail Wajib dilakukan
        $totalInvestigationRequired = IncidentReport::where('classify_id','!=',1)->where('classify_id','!=',2)->where('result_id','!=',3)->count();
        // $totalInvestigationDone = count(IncidentReport::where('classify_id','!=',1)->where('classify_id','!=',2)->where('status', "Close")->get());

        //Investigasi Detail Sudah dilakukan
        $totalInvestigationDone = IncidentReport::where('result_id', 6)->where('classify_id','!=',1)->where('classify_id','!=',2)->count();
        // $totalInvestigationPending = count(IncidentReport::where('result_id', 2)->get());

        //Investigasi Detail Belum dilakukan
        $totalInvestigationPending = $totalInvestigationRequired - $totalInvestigationDone;



        // array_push($countDeptOrigins,1, $totalOpenReport);
        // array_push($countOpenDeptDesignations, 1, $totalOpenReport);
        // array_push($countCloseDeptDesignations,1,  $totalCloseReport);

        // array_push($countDeptOrigins,14);
        // array_push($countOpenDeptDesignations,14);
        // array_push($countCloseDeptDesignations,14);


        // dd(json_encode($countDeptOrigins,JSON_NUMERIC_CHECK));

        // $incidentReportNotifications = IncidentReportNotification::where(function($query){
        //     $query->where('sender_id', auth()->user()->id)
        //     ->orWhere('receiver_id', auth()->user()->id);
        // })->orderBy('created_at','DESC')->get();

        // $unreads = $this->unreadNotifications();

        // $unread  = IncidentReportNotification::unreadCount();

        // return view('home',compact('matrixs','rows','columns','dataCategory','countOpenCorrective','countCloseCorrective','countOpenPreventive','countClosePreventive','countPreventive','countCorrective','countCorrectivePreventive','countCloseCorrectivePreventive','countOpenCorrectivePreventive','totalReportApproved','totalReportRejected','totalReportInProgress','totalOpenReport','deptFollowOrigin','arrayOrigins','countDeptOrigins','countOpenDeptDesignations','countCloseDeptDesignations','totalCloseReport','totalReport','totalReportApprovedAccumulative','totalCloseReport','totalReportInProgressAccumulative','arrayCategories','countObligatoryInvestigations','countAlreadyInvestigations','countNotFinishedInvestigations','totalInvestigationRequired','totalInvestigationDone','totalInvestigationPending'));
        return view('home',compact('matrixs','rows','columns','dataCategory','countOpenCorrective','countCloseCorrective','countOpenPreventive','countClosePreventive','countPreventive','countCorrective','countCorrectivePreventive','countCloseCorrectivePreventive','countOpenCorrectivePreventive','totalReportApproved','totalReportRejected','totalReportInProgress','totalOpenReport','deptFollowOrigins','arrayOrigins','countDeptOrigins','countOpenDeptDesignations','countCloseDeptDesignations','totalCloseReport','totalReport','totalReportApprovedAccumulative','totalCloseReport','totalReportInProgressAccumulative','arrayCategories','countObligatoryInvestigations','countAlreadyInvestigations','countNotFinishedInvestigations','totalInvestigationRequired','totalInvestigationDone','totalInvestigationPending'));
    }

    private function checkAccessRights(IncidentReportNotification $incidentReportNotification){
        $user = Auth::user();

        if ($incidentReportNotification->sender_id !== $user->id && $incidentReportNotification->receiver_id !== $user->id) {
            return abort(401);
        }
    }

    public function unreadNotifications(): array{
        $incidentReportNotification = IncidentReportNotification::where(function($query){
            $query->where('sender_id', auth()->user()->id)
                ->orWhere('receiver_id', auth()->user()->id);
        })->orderBy('created_at','DESC');

        $unreadCount = 0;

        if($incidentReportNotification !== auth()->user()->id){
            $unreadCount++;
        }

        return ['inbox' =>$unreadCount];
    }

}

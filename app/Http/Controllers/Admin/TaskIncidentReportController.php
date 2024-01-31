<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTaskIncidentReportRequest;
use App\Http\Requests\StoreTaskIncidentReportRequest;
use App\Http\Requests\UpdateTaskIncidentReportRequest;
use App\Notifications\IncidentReport\IncidentStatusCloseInitiator;
use App\Notifications\IncidentReport\IncidentStatusCloseSuperintendent;
use App\Notifications\IncidentReport\IncidentStatusCloseManagerExecutor;
use App\Notifications\IncidentReport\IncidentActionExecutor;
use App\Notifications\IncidentReport\IncidentReportDoneAllUser;
use App\Notifications\IncidentReport\InvestigationDetailActionExecutor;
use Carbon\Carbon;
use App\IncidentReport;
use App\User;
use App\InvestigationDetail;
use App\DesignationDepartment;
use App\DistributionIncident;
use App\RootCause;
use App\Precortive;
use App\CategoryIncident;
use App\ChemicalRelease;
use App\AreaIncident;
use App\ClassificationIncident;
use Gate;
use DB;
use Notification;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;

class TaskIncidentReportController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('task_incident_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $authDeptId = auth()->user()->dept_id;

        $authId = auth()->user()->id;

        if(isset($request->date_filter)){
            $parts = explode(' - ', $request->date_filter);
            $date_from = $parts[0];
            $date_to = $parts[1];
        }else{
            $carbon_date_from = new Carbon('last Monday');
            $date_from = $carbon_date_from->toDateString();
            $carbon_date_to = new Carbon('This Sunday');
            $date_to = $carbon_date_to->toDateString();
        }
    
    
        if(auth()->user()->is_initiator || auth()->user()->is_superintendent || auth()->user()->is_administrator || auth()->user()->is_superadministrator || auth()->user()->is_administrator2){
            
            if(!empty($request->date_filter)){
                $incidentReports = IncidentReport::where('action_by_id', $authId)->whereBetween('date_incident', [$date_from, $date_to])->orWhereBetween('date_action', [$date_from, $date_to])->get();
                // $incidentReports = IncidentReport::where('action_by_id', $authId)->whereBetween('date_incident', [$date_from, $date_to])->get();
            //     $incidentReports = IncidentReport::where('date_incident', '>=', $date_from)->where('date_incident', '<=', $date_to)
            //     ->get()->sortBy('date_incident')->groupBy(function ($query) {
            //     if ($query->date_incident instanceof \Carbon\Carbon) {
            //         return Carbon::parse($query->date_incident)->format('Y-m-d H:i:s');
            //     }
            //     return Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $query->date_incident)->format('Y-m-d H:i:s');
            // })->map(function ($entries, $group) {
            //     return $entries->sum('amount');
            // });
                
            }else{
                // DB::enableQueryLog();
                $incidentReports = IncidentReport::with('investigations.precortives')->where('action_by_id',$authId)->where('status','Open')->get();
                // $incidentReports = IncidentReport::with('investigations.precortiveInvestigation')->where('action_by_id',$authId)->where('status','Open')->get();
                // dd(json_encode($incidentReports, JSON_PRETTY_PRINT));
                // $query_dump = DB::getQueryLog();
                // dd($query_dump);
                // dd($incidentReports);

                
        
                
            }
            
        }

        elseif(auth()->user()->is_manager){
            $incidentReports = IncidentReport::where('dept_designated_id', $authDeptId)->where('status','Open')->whereNotNull('acknowledged_by_id')->with('dept_designated')->get();
        }
        elseif(auth()->user()->is_admin){
            $incidentReports = IncidentReport::all();
        }

        
        return view('admin.taskIncidentReports.index', compact('incidentReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_incident_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dept_designations = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.taskIncidentReports.create');
    }

    public function store(StoreIncidentReportRequest $request)
    {
        $data['status'] = "close";
        $incidentReport = IncidentReport::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        foreach ($request->input('file', []) as $file) {
            $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $incidentReport->id]);
        }

        return redirect()->route('admin.task-incident-reports.index');
    }

    public function edit(IncidentReport $incidentReport, InvestigationDetail $investigationDetail)
    {
        abort_if(Gate::denies('task_incident_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $authDeptId = auth()->user()->dept_id;

        $authId = auth()->user()->id;

        $incidentReports = IncidentReport::all();

        $investigationDetails = InvestigationDetail::all();
        
        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chemical_releases = ChemicalRelease::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dept_designations = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $precortives = Precortive::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $category_incidents = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $pics = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classification_incidents = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actioned_bys = User::where('dept_id',$authDeptId)->where('id','!=',$authId)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $countInvestigation = DB::table('investigation_details')->where('incident_report_id',$incidentReport->id)->count();

        $countStatusInvestigation = DB::table('investigation_details')->where('incident_report_id',$incidentReport->id)->where('status','open')->count();

        $checkInvestigation = InvestigationDetail::where('incident_report_id',$incidentReport->id)->get();

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','action_by','chemical');

        $investigationDetail->load('picInvestigation','precortives');
        
        return view('admin.taskincidentReports.edit', compact('incidentReport','investigationDetail','precortives','pics','root_causes','category_incidents','classification_incidents','actioned_bys','chemical_releases','area_incidents','incidentReports','checkInvestigation','countStatusInvestigation','countInvestigation'));
    }

    public function update(UpdateTaskIncidentReportRequest $request, IncidentReport $incidentReport)
    {
        $data = $request->all();
        unset($data['date_incident']);
        if(auth()->user()->is_manager){
            $data['result_id'] = 5;
            $data['assigned_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $incidentReport->update($data);
            $users = DB::table('users')
            ->join('incident_reports','users.id','=','incident_reports.action_by_id')
            ->where('incident_reports.id',$incidentReport->id)
            ->select('users.*')->get();

            $distribution_incident = new DistributionIncident();
            $distribution_incident->ir_id = $incidentReport->id;
            $distribution_incident->name_id = auth()->user()->id;
            $distribution_incident->result_id = 5;
            $distribution_incident->description = 'Assigned';
            $distribution_incident->status = 'Open';
            $distribution_incident->save();

            $toEmail = $users[0]->email;
            $userName = $users[0]->name; 
             //Email untuk Executor setelah Assign dari Manager Departemen Terkait
             Notification::route('mail',$toEmail)->notify(new IncidentActionExecutor($incidentReport,$userName));

        }
        else{

        if(($request->input('recommendations')) != NULL ){
            foreach ($request->input('recommendations') as $key => $recommendation) {
                $createInvestigations =  $incidentReport->investigations()->create([
                     'recommendation' => $recommendation,
                     'status'  => 'Open',
                     'date_deadline' => $request->date_deadlines[$key],
                     'pic_id' => $request->pics[$key],
                     'precortive_id' => $request->precortives[$key],
                   
                 ]);
            

                 $investigationDetails = InvestigationDetail::with('incidents','picInvestigation')
                 ->where('pic_id',$createInvestigations->pic_id)
                                    ->where('investigation_details.incident_report_id',$createInvestigations->incident_report_id)->get();

                $userInvestigations = DB::table('users')
                ->join('investigation_details', 'investigation_details.pic_id', '=', 'users.id')
                ->where('users.id', $createInvestigations->pic_id)
                ->where('investigation_details.incident_report_id',$createInvestigations->incident_report_id)
                ->select('users.email','users.name','investigation_details.recommendation')
                ->get();


            //  dump($toEmail);
                //  $userInvestigations = DB::table('users')
                //  ->join('investigation_details')
                //  ->where('users.id',$createInvestigations->pic_id)
                //  ->select('users.*',)->get();
                
                //  dump($checkInvestigationDetails);
                 
             //Mail Investigation Detail

              foreach($investigationDetails as $investigationDetail){       

             $toEmail = $investigationDetail->picInvestigation->email;
             $userName = $investigationDetail->picInvestigation->name;

            
                
            }
            Notification::route('mail',$toEmail)->notify(new InvestigationDetailActionExecutor($incidentReport,$userName,$investigationDetail));

        }   
        }else{

            $incidentReport->update($data);
        }

            

            
            // foreach ($createInvestigations as $createInvestigation) {
            //     $userInvestigation = $createInvestigation->pic_id;
            //     dump($userInvestigation);
            // }
            // die();
            

            // $prrequest = PrRequest::create([
            //     'date' => $request->date,
            //     'request_number' => $requestnumber,
            //     'department' => $request->department,
            //     'project' => $request->project,
            //     'site' => $request->site,
            //     'group' => $request->group,
            //     'user_location' => $request->user_location,
            //     'user_id' => Auth::id(),
            // ]);
            
        }

        if (count($incidentReport->photos) > 0) {
            foreach ($incidentReport->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $incidentReport->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        if (count($incidentReport->file) > 0) {
            foreach ($incidentReport->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $incidentReport->file->pluck('file_name')->toArray();

        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
            }
        }


        if (count($incidentReport->file_initiator) > 0) {
            foreach ($incidentReport->file_initiator as $media) {
                if (!in_array($media->file_name, $request->input('file_initiator', []))) {
                    $media->delete();
                }
            }
        }

        $media = $incidentReport->file_initiator->pluck('file_name')->toArray();

        foreach ($request->input('file_initiator', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file_initiator');
            }
        }

        return redirect()->route('admin.task-incident-reports.index');
    }

    public function show(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('task_incident_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $incidentReports = IncidentReport::with('investigations.precortives')->where('action_by_id',$authId)->where('status','Open')->get();

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','chemical');

        // $correctives =  InvestigationDetail::where('precortive_id', 1)->where('pic_id',$authId)->get();
        
        // $preventives =  InvestigationDetail::where('precortive_id', 2)->where('pic_id',$authId)->get();
        
        $distribution_incidents = DistributionIncident::where('ir_id',$incidentReport->id)->get();

        // $investigationDetails2 = IncidentReport::with('investigations.precortives')->where('action_by_id',$authId)->where('status','Open')->get();


        $investigation_details = InvestigationDetail::with('incidents','precortives')->where('incident_report_id',$incidentReport->id)->get();

        return view('admin.taskIncidentReports.show', compact('incidentReport','distribution_incidents','investigation_details'));
    }

    public function destroy(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('task_incident_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncidentReportRequest $request)
    {
        IncidentReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('task_incident_report_create') && Gate::denies('task_incident_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new IncidentReport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function actionByExecutor(IncidentReport $incidentReport) {
        $incidentReport->status = "Close";
        $incidentReport->result_id= 6;
        
        $incidentReport->update();

        $distribution_incident = new DistributionIncident();
        $distribution_incident->ir_id = $incidentReport->id;
        $distribution_incident->name_id = auth()->user()->id;
        $distribution_incident->description = 'Handled';
        $distribution_incident->result_id = 6;
        $distribution_incident->status = 'Close';
        $distribution_incident->save();
        // dd($incidentReport);
        // $incidentReport->update(['result_id' => 1,
        // 'reviewed_by_id' => auth()->user()->id
        // ]);
        $users = DB::table('users')
        ->join('incident_reports','users.id','=','incident_reports.nama_pelapor_id')
        ->where('incident_reports.id',$incidentReport->id)
        ->select('users.*')->get();
        // $users3 = DB::table('users')
        // ->where('users.id',$users2[0]->parent_id)->get();    
        $users2 = DB::table('incident_reports')
        ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
        ->where('incident_reports.id',$incidentReport->id)
        ->select('parent_id')->get();

        $users3 = DB::table('users')
            ->where('users.id',$users2[0]->parent_id)->get();    

        $search = 'Manager';
        $users4 = DB::table('users')
            ->join('incident_reports','users.dept_id','=','incident_reports.dept_designated_id')
            ->join('job_titles','users.job_id','=','job_titles.id')
            ->where('job_titles.name','LIKE','%'. $search . '%')
            ->where('incident_reports.id',$incidentReport->id)
            ->select('users.*')->get();


        $toEmailCreator = $users[0]->email;
        $userNameCreator = $users[0]->name; 
        $toEmailSuperintendent = $users3[0]->email;
        $userNameSuperintendent = $users3[0]->name;
        $toEmailManagerExecutor = $users4[0]->email;
        $userNameManagerExecutor = $users4[0]->name;
        // Notification::route('mail',$toEmailCreator)->notify(new IncidentStatusCloseInitiator($incidentReport,$userNameCreator));
        // Notification::route('mail',$toEmailSuperintendent)->notify(new IncidentStatusCloseSuperintendent($incidentReport,$userNameSuperintendent));
        // Notification::route('mail',$toEmailManagerExecutor)->notify(new IncidentStatusCloseManagerExecutor($incidentReport,$userNameManagerExecutor));
        
        if($incidentReport->area->id === 1){

            $users10 = DB::table('users')
            ->join('area_user','users.id','=','area_user.user_id')
            ->where('area_user.area_id', 1)
            ->select('name', 'email')->get();


            // foreach($users10 as $value){
            //     $emailUser = $value->email;
            //     $userName = $value->name;
            //     // dump($userName);
            //     Notification::route('mail',$emailUser)->notify(new IncidentReportDoneAllUser($incidentReport,$userName));
            // }
        }elseif($incidentReport->area->id === 2){
            $users10 = DB::table('users')
            ->join('area_user','users.id','=','area_user.user_id')
            ->where('area_user.area_id', 2)
            ->select('name','email')->get();

            // foreach($users10 as $value){
            //     $emailUser = $value->email;
            //     $userName = $value->name;
            //     // dump($userName);
            //     Notification::route('mail',$emailUser)->notify(new IncidentReportDoneAllUser($incidentReport,$userName));
            // }
        }


        //  // Ini untuk Email Semua User
        //  $users4 = DB::table('users')
        //  ->select('users.*')->get()->toArray();
        // //Ini untuk Email Semua Manager
        // // $users4 = DB::table('users')
        // // ->join('job_titles','users.job_id','=','job_titles.id')
        // // ->where('job_titles.name','LIKE','%'. $search . '%')
        // // ->select('users.*')->get()->toArray();
        
        // foreach($users4 as $r){
        //     $result = $r->email;
        //     $username = $r->name;
        //     Notification::route('mail',$result)->notify(new IncidentReportAllUser($incidentReport,$username));
        // }

        return redirect()->route('admin.task-incident-reports.index');
    }
}

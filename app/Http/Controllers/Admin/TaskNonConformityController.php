<?php

namespace App\Http\Controllers\Admin;

use App\AreaIncident;
use App\CommentNonconformity;
use App\DesignationDepartment;
use App\Entity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNonConformityReportRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Location;
use App\NonConformity;
use App\NonPlantLocation;
use App\Notifications\IncidentReport\IncidentActionManagerExecutor;
use App\Notifications\NonConformityReport\NonConformityApprovalAdministrator;
use App\Notifications\NonConformityReport\NonConformityApprovalManagerExecutor;
use App\Notifications\NonConformityReport\NonConformityRejectedAdministrator;
use App\Notifications\NonConformityReport\NonConformityRejectedManager;
use App\Notifications\NonConformityReport\NonConformityVerificationAdministrator;
use App\RegionIncident;
use App\RegionNcr;
use App\RootCause;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TaskNonConformityController extends Controller
{

    use MediaUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('task_nonconformity_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authDeptId = auth()->user()->dept_id;
        $authId = auth()->user()->id;

        if (auth()->user()->is_superintendent) {

            $nonConformityReports = NonConformity::where('assigned_to_id', $authId)->orWhere('result_id', 3)->with('assigned_to')->get();
        } else if (auth()->user()->is_manager) {

            // $nonConformityReports = NonConformity::where('dept_designated_id', $authDeptId)->where('result_id', '=', 1)->with('dept_designated')->get();

            $nonConformityReports = NonConformity::whereHas('assigned_to', function ($query) {
                $query->where('parent_id', auth()->user()->id);
            })->where('result_id', 1)->orWhere('result_id', 8)->get();


            // $incidentReports = NonConformity::with(['dept_origin'])->where('dept_designated_id', $authDeptId)->where('result_id', '!=', 4)->orWhere('nama_pelapor_id', $authId)->get();
        } else {
            $nonConformityReports = NonConformity::where('assigned_to_id', $authId)->orWhere('result_id', 3)->with('assigned_to')->get();
        }

        return view('admin.taskNonConformityReports.index', compact('nonConformityReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NonConformity $nonConformity)
    {

        $authId = auth()->user()->id;

        $nonConformityReports = NonConformity::all();

        abort_if(Gate::denies('task_nonconformity_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonPlantlocations = NonPlantLocation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region_ncrs = RegionNcr::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dept_designateds = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entitys = Entity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.taskNonConformityReports.create', compact('root_causes', 'dept_designateds', 'authId', 'locations', 'area_incidents', 'region_ncrs', 'entitys', 'nonConformityReports', 'nonPlantlocations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $existing_schedule = NonConformity::where('teacher', $request->teacher)
        //     ->where('subject_code_id', $request->subject)
        //     ->where('room_id', $request->room)
        //     ->where('start_time', $request->start_time)
        //     ->first();
        if (!($request->filter_submit)) {
            $data = $request->all();

            $year = Carbon::now()->format('y');
            $month = Carbon::now()->format('m');

            $nextNumberReport = "NCR-" . $year . $month  . "-" . NonConformity::getNextNumberReport();

            $data['nama_pelapor_id'] = auth()->id();
            $data['dept_origin_id'] = Auth::user()->dept_id;
            $data['result_id'] = 4;
            $data['status'] = 'Open';
            $data['no_laporan'] = $nextNumberReport;
            $nonConformityReport = NonConformity::create($data);
        } else {
        }


        return redirect()->route('admin.nonconformity-reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NonConformity $nonConformity)
    {
        abort_if(Gate::denies('task_nonconformity_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonConformity->load('nama_pelapor', 'dept_origin', 'root_cause', 'area', 'dept_designated', 'action_by', 'result', 'entity', 'acknowledged_by');

        $comment_nonconformitys = CommentNonconformity::where('nr_id', $nonConformity->id)->get();

        // $investigation_details = InvestigationDetail::with('incidents', 'precortives')->where('incident_report_id', $incidentReport->id)->get();

        return view('admin.taskNonConformityReports.show', compact('nonConformity', 'comment_nonconformitys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NonConformity $nonConformity)
    {

        abort_if(Gate::denies('nonconformity_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dept_designateds = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entitys = Entity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonConformity->load('nama_pelapor', 'dept_origin', 'root_cause', 'area', 'dept_designated', 'action_by', 'result', 'entity', 'location', 'acknowledged_by');

        return view('admin.taskNonConformityReports.edit', compact('root_causes', 'dept_designateds', 'nonConformity', 'area_incidents', 'entitys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NonConformity $nonConformity)
    {

        $authId = auth()->user()->id;

        $data = $request->all();

        $comment_nonconformitys = CommentNonconformity::where('nr_id', $nonConformity->id)->get();

        $nonConformity->update($data);

        if (count($nonConformity->file) > 0) {
            foreach ($nonConformity->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $nonConformity->file->pluck('file_name')->toArray();

        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $nonConformity->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
            }
        }

        if (count($nonConformity->photos) > 0) {
            foreach ($nonConformity->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $nonConformity->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $nonConformity->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }


        return view('admin.taskNonConformityReports.show', compact('nonConformity', 'comment_nonconformitys'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NonConformity $nonConformity)
    {
        abort_if(Gate::denies('task_nonconformity_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonConformity->delete();

        return back();
    }


    // public function getRegionLocations(Request $request)
    // {
    //     //     $regionNcr = RegionNcr::findOrFail($request->id);
    //     //     $regionNcrFiltered = $regionNcr->regionLocations->pluck('name', 'id');

    //     $location =  Location::where('region_ncr_id', $request->region_ncr_id)->get();

    //     if (count($location) > 0) {
    //         return response()->json($location);
    //     }
    // }

    public function getRegionLocations(Request $request)
    {
        //     $regionNcr = RegionNcr::findOrFail($request->id);
        //     $regionNcrFiltered = $regionNcr->regionLocations->pluck('name', 'id');

        $data =  Location::select('name', 'id')->where('region_ncr_id', $request->id)->get();

        return response()->json($data);
        // if (count($location) > 0) {
        //     return response()->json($location);
        // }
    }

    public function actionByExecutor(NonConformity $nonConformity)
    {

        $authId = auth()->user()->id;

        $nonConformity->result_id = 1;
        $nonConformity->action_by_id = $authId;


        $users_3 = NonConformity::join('users', 'nonconformity_reports.assigned_to_id', 'users.id')
            ->join('role_user', 'role_user.user_id', 'users.id')
            ->join('users as level1', 'level1.id', 'users.parent_id')
            ->where('nonconformity_reports.id', $nonConformity->id)
            ->select('level1.name', 'level1.email')
            ->get();

        $toEmail = $users_3[0]->email;
        $userName = $users_3[0]->name;

        //Notifikasi Action ke Manager Executor

        // Notification::route('mail', $toEmail)->notify(new NonConformityApprovalManagerExecutor($nonConformity, $userName));


        $nonConformity->update();


        return redirect()->route('admin.task-nonconformity-reports.index');
    }



    public function approvalByManager(NonConformity $nonConformity)
    {


        $authId = auth()->user()->id;

        $nonConformity->result_id = 2;
        $nonConformity->acknowledged_by_id = $authId;
        $nonConformity->update();

        $users_3 = User::join('role_user', 'role_user.user_id', 'users.id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->where('roles.id', 10)
            ->select('users.name', 'users.email')
            ->get();




        // $search = 'Manager';
        // $users2 = DB::table('users')
        //     ->join('incident_reports', 'users.dept_id', '=', 'incident_reports.dept_designated_id')
        //     ->join('job_titles', 'users.job_id', '=', 'job_titles.id')
        //     ->where('job_titles.name', 'LIKE', '%' . $search . '%')
        //     ->where('incident_reports.id', $incidentReport->id)
        //     ->select('users.*')->get();

        // $toEmail = $users2[0]->email;
        // $userName = $users2[0]->name;


        //Email untuk Manager Executor

        $toEmail_1 = 'eman.sonda@kpi.co.id';
        $toEmail_2 = 'rahmatullah.gobel@kpi.co.id';
        $userName = 'Administrator';
        //Notifikasi ke Administrator Setelah Approval Manager

        // Notification::route('mail', [$toEmail_1, $toEmail_2])->notify(new NonConformityVerificationAdministrator($nonConformity, $userName));

        // Notification::route('mail',$toEmail2)->notify(new IncidentActionManagerExecutor($incidentReport,$userName));

        return redirect()->route('admin.task-nonconformity-reports.index');
    }

    public function rejectByManager(NonConformity $nonConformity, Request $request)
    {

        $authId = auth()->user()->id;

        $nonConformity->result_id = 3;
        $nonConformity->reason2 = $request->input('reason2');

        $nonConformity->update();


        $comment = new CommentNonconformity();
        $comment->nr_id = $nonConformity->id;
        $comment->result_id = 9;
        $comment->description = $request->input('reason2');
        $comment->name_id = $authId;
        $comment->save();

        // $search = 'Manager';
        // $users2 = DB::table('users')
        //     ->join('incident_reports', 'users.dept_id', '=', 'incident_reports.dept_designated_id')
        //     ->join('job_titles', 'users.job_id', '=', 'job_titles.id')
        //     ->where('job_titles.name', 'LIKE', '%' . $search . '%')
        //     ->where('incident_reports.id', $incidentReport->id)
        //     ->select('users.*')->get();


        $users2 = DB::table('nonconformity_reports')
            ->join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
            ->where('nonconformity_reports.id', $nonConformity->id)
            ->select('users.*')->get();

        $toEmail = $users2[0]->email;
        $userName = $users2[0]->name;


        // $toEmail = 'daniel.sinaga@kpi.co.id';
        // $userName = 'Daniel Sinaga';


        //Reject Email untuk Manager Executor
        // Notification::route('mail', $toEmail)->notify(new NonConformityRejectedManager($nonConformity, $userName));

        return redirect()->route('admin.task-nonconformity-reports.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\AreaIncident;
use App\CommentNonconformity;
use App\DesignationDepartment;
use App\Entity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNonConformityReportRequest;
use App\Location;
use App\Mail\MyTestMail;
use App\Mail\NonConformityRejectedAdministrator as MailNonConformityRejectedAdministrator;
use App\Mail\NonConformityRejectedManager;
use App\NonConformity;
use App\NonPlantLocation;
use App\Notifications\NonConformityReport\NonConformityActionExecutor;
use App\Notifications\NonConformityReport\NonConformityApprovalAdministrator;
use App\Notifications\NonConformityReport\NonConformityAssignToExecutor;
use App\Notifications\NonConformityReport\NonConformityDoneAllUser;
use App\Notifications\NonConformityReport\NonConformityRejectedAdministrator;
use App\Notifications\NonConformityReport\NonConformityRejectedAdministratorVerification;
use Illuminate\Support\Facades\Notification;
use App\RegionIncident;
use App\RegionNcr;
use App\RootCause;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NonConformityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('nonconformity_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $nonConformityReports = NonConformity::all();
        $authId = auth()->user()->id;
        $dateNow = Carbon::now();
        $availableTime = 7;

        $overdueReports = NonConformity::whereDate('created_at','>=',$dateNow->format('m-d-y'))->get();
        // $overdueReports = NonConformity::whereDate('created_at','>',$dateNow->format('m-d-y'))->get()->toArray();



        // foreach ($overdueReports as $item) {
        // // $overdueTest = $this->calculateOverDueDate($item->date_event);
        // $overdueTest = $dateNow->diffInDays($item->date_event);
        // dump($overdueTest);
        // }

        // die();


        // $overdueDays = $dateNow->diffInDays($overdueReports);



// $expiry_date = NonConformity::whereDate('create=d_at','>',$dateNow->format('m-d-y'))->Carbon::parse()->addDays($availableTime - 1));

        // $testDate = NonConformity::whereDate('created_at','<',$dateNow)->get();

        // dd($overdueReports);

        // foreach ($nonConformityReports as $nonConformity) {


        // $overdueTest = $this->calculateOverDueDate($nonConformity);

        //     dump($overdueTest);
        // }
        // die();


        // dd($overdueTest);
        // $expiry_date = NonConformity::whereDate()->Carbon::parse()->addDays($availableTime - 1));

        // if (isset($request->date_filter)) {
        //     $parts = explode(' - ', $request->date_filter);
        //     $date_from = $parts[0];
        //     $date_to = $parts[1];
        // } else {
        //     $carbon_date_from = new Carbon('last Monday');
        //     $date_from = $carbon_date_from->toDateString();
        //     $carbon_date_to = new Carbon('This Sunday');
        //     $date_to = $carbon_date_to->toDateString();
        // }



    // dd($overdueReports);

        // foreach ($nonConformityReports as $nonConformityReport) {

        //     $now = Carbon::now();
        //     $timesAssigned = $nonConformityReport->assigned_at;
        //     $timesApprovedFully = $nonConformityReport->acknowledged_at;


        //     $dateAssigned =  date('Y-m-d H:i:s', strtotime($timesAssigned));
        //     $dateApprovedFully = date('Y-m-d H:i:s', strtotime($timesApprovedFully));
        //     $dateNow = date('Y-m-d H:i:s', strtotime($now));




        //     $datedateNow = Carbon::parse($dateNow);

        //     $datedateAssigned = Carbon::parse($dateAssigned);

        //     $date_diff = $datedateNow->diffInDays($datedateAssigned);


        // }

        //    $start = Carbon::parse($request->start_date);

        //    $end = Carbon::parse($request->end_date);

        //    $filtered = IncidentReport::whereDate('created_at','<=',$end->format('m-d-y'))
        //    ->whereDate('created_at','>=',$start->format('m-d-y'))->get();



        return view('admin.nonConformitys.index', compact('nonConformityReports','overdueReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NonConformity $nonConformity, Request $request)
    {

        $authId = auth()->user()->id;
        $data = $request->all();


        // $nonConformityReports = NonConformity::all();

        if (isset($request->description)) {


            $data = NonConformity::where('location_ncr_id', $request->location_ncr_id)
                ->orWhere('non_plant_location_id', $request->non_plant_location_id)
                ->orWhere('area_id', $request->area_id)
                ->orWhere('region_id', $request->region_ncr_id)
                ->orWhere('description', $request->description2)
                ->orWhere('root_cause_id', $request->root_cause_id)
                ->get();

            // $data = NonConformity::where('location_ncr_id', $request->teacher)
            //     ->orWhere('non_plant_location_id', $request->subject)
            //     ->orWhere('non_plant_location_id', $request->subject)
            //     ->orWhere('region_ncr_id', $request->room)
            //     ->orWhere('root_cause_id', $request->start_time)
            //     ->first();

            // $data = NonConformity::where('description', $request->date_filter)->get();



            // $data['nama_pelapor_id'] = auth()->id();
            // $data['dept_origin_id'] = Auth::user()->dept_id;
            // $data['result_id'] = 4;
            // $data['status'] = 'Open';
            // $data['no_laporan'] = $nextNumberReport;
            // $nonConformityReport = NonConformity::create($data);


            // $toEmail_1 = 'eman.sonda@kpi.co.id';
            // $toEmail_2 = 'rahmatullah.gobel@kpi.co.id';
            // $userName = 'Administrator';

            // Notification::route('mail', [$toEmail_1, $toEmail_2])->notify(new NonConformityApprovalAdministrator($nonConformityReport, $userName));
        } else {

            $data = NonConformity::all();
        }

        abort_if(Gate::denies('nonconformity_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonPlantlocations = NonPlantLocation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region_ncrs = RegionNcr::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $dept_designateds = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actioned_bys = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 4);
        })->orderBy('name', 'asc')->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        $entitys = Entity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nonConformitys.create', compact('root_causes', 'authId', 'locations', 'area_incidents', 'region_ncrs', 'entitys', 'data', 'nonPlantlocations', 'actioned_bys','nonConformity'));
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
        // if (($request->filter_submit)) {

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


        $toEmail_1 = 'eman.sonda@kpi.co.id';
        $toEmail_2 = 'rahmatullah.gobel@kpi.co.id';
        $userName = 'Administrator';

        // Notifikasi ke Administrator
        // Notification::route('mail', [$toEmail_1, $toEmail_2])->notify(new NonConformityApprovalAdministrator($nonConformityReport, $userName));


        // $filterNonConformity = NonConformity::where('teacher', $request->teacher)
        //     ->orWhere('subject_code_id', $request->subject)
        //     ->orWhere('room_id', $request->room)
        //     ->orWhere('start_time', $request->start_time)
        //     ->first();

        // Notification::route('mail', $toEmail)->notify(new NonConformityActionExecutor($nonConformity, $userName));

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
        abort_if(Gate::denies('nonconformity_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonConformity->load('nama_pelapor', 'dept_origin', 'root_cause', 'area', 'dept_designated', 'action_by', 'result', 'entity', 'acknowledged_by');

        $comment_nonconformitys = CommentNonconformity::where('nr_id', $nonConformity->id)->get();

        // $comment_nonconformitys = CommentNonconformity::with('no_incident')->where('nr_id', $incidentReport->id)->get();

        return view('admin.nonConformitys.show', compact('nonConformity', 'comment_nonconformitys'));
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

        // $dept_designateds = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        // $roleSuperintendent = DB::table('users')
        //     ->join('incident_reports', 'incident_reports.nama_pelapor_id', 'users.id')
        //     ->join('role_user', 'role_user.user_id', 'users.id')
        //     ->join('users as level1', 'level1.id', 'users.parent_id')
        //     ->where('incident_reports.id', $incidentReport->id)
        //     ->select('users.name', 'level1.name as superior')
        //     ->get();


        // $actioned_bys = User::where('dept_id', $authDeptId)->where('id', '!=', $authId)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        $actioned_bys = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 4);
        })->orderBy('name', 'asc')->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        // $dept_designateds = User::where('dept_id')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entitys = Entity::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonConformity->load('nama_pelapor', 'dept_origin', 'root_cause', 'area', 'dept_designated', 'action_by', 'result', 'entity', 'location', 'acknowledged_by');

        return view('admin.nonConformitys.edit', compact('root_causes', 'nonConformity', 'area_incidents', 'entitys', 'actioned_bys', 'locations'));
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


        return view('admin.nonConformitys.show', compact('nonConformity', 'comment_nonconformitys'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NonConformity $nonConformity)
    {
        abort_if(Gate::denies('nonconformity_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

    // public function filterReport(Request $request)
    // {

    //     $data = NonConformity::where()->orWhere()->get();
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

    // public function massDestroy(MassDestroyIncidentReportRequest $request)
    // {
    //     IncidentReport::whereIn('id', request('ids'))->delete();

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }



    public function approvalByAdministrator(NonConformity $nonConformity)
    {


        $authId = auth()->user()->id;
        $dateNow = Carbon::now();

        // $users2 = DB::table('nonconformity_reports')
        //     ->join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
        //     ->where('nonconformity_reports.id', $nonConformity->id)
        //     ->select('users.*')->get();

        // $toEmail = $users2[0]->email;
        // $userName = $users2[0]->name;

        // Notification::route('mail', $toEmail)->notify(new NonConformityActionExecutor($nonConformity, $userName));

        if ($nonConformity->result_id == 4) {

            $users_2 = NonConformity::join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
                ->where('nonconformity_reports.id', $nonConformity->id)->get();


            // $toEmail = $users_2[0]->email;
            // $userName = $users_2[0]->name;

            foreach ($users_2 as $user) {
                // Notification::route('mail', $user->email)->notify(new NonConformityActionExecutor($nonConformity, $userName));

                // Notifikasi Executor
                // Notification::route('mail', $user->email)->notify(new NonConformityAssignToExecutor($nonConformity, $user->name));
            }

            // Notification::route('mail', $toEmail)->notify(new NonConformityAssignToExecutor($nonConformity, $userName));
            $nonConformity->update();
        } elseif ($nonConformity->result_id == 2) {
            $nonConformity->result_id = 6;
            $nonConformity->assigned_at = Carbon::now();
            $nonConformity->status = 'Close';
            $nonConformity->update();

            $users_1 = NonConformity::join('users', 'users.id', '=', 'nonconformity_reports.nama_pelapor_id')
                ->where('nonconformity_reports.id', $nonConformity->id)->get();


            $users_2 = NonConformity::join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
                ->where('nonconformity_reports.id', $nonConformity->id)->get();

            $users_3 = NonConformity::join('users', 'nonconformity_reports.assigned_to_id', 'users.id')
                ->join('role_user', 'role_user.user_id', 'users.id')
                ->join('users as level1', 'level1.id', 'users.parent_id')
                ->where('nonconformity_reports.id', $nonConformity->id)
                ->select('level1.name', 'level1.email')
                ->get();

            $toEmail_1 = $users_1[0]->email;
            $toEmail_2 = $users_2[0]->email;
            $toEmail_3 = $users_3[0]->email;

            $userName = 'Users';

            //Notifikasi Ke User (Pelapor, Executor, Atasan Executor)

            Notification::route('mail', [$toEmail_1, $toEmail_2, $toEmail_3])->notify(new NonConformityDoneAllUser($nonConformity, $userName));


            // Notification::route('mail', $toEmail)->notify(new NonConformityDoneAllUser($nonConformity, $userName));
        }
        // $users2 = DB::table('nonconformity_reports')
        //     ->join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
        //     ->where('nonconformity_reports.id', $nonConformity->id)
        //     ->select('users.*')->get();



        // $users3 = DB::table('users')
        //     ->where('users.id', $users2[0]->parent_id)->get();

        // $toEmail = $users3[0]->email;
        // $userName = $users3[0]->name;

        // Notification::route('mail', $toEmail)->notify(new NonConformityDoneAllUser($nonConformity, $userName));


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

        // Notification::route('mail', $toEmail)->notify(new IncidentActionManagerExecutor($incidentReport, $userName));

        // $users2 = DB::table('incident_reports')
        //     ->join('users', 'incident_reports.reviewed_by_id', '=', 'users.id')
        //     ->where('incident_reports.id', $nonConformity->id)
        //     ->select('parent_id')->get();

        // $users3 = DB::table('users')
        //     ->where('users.id', $users2[0]->parent_id)->get();

        // $toEmail = $users3[0]->email;
        // $userName = $users3[0]->name;

        // Notification::route('mail', $toEmail)->notify(new NonConformityDoneAllUser($nonConformity, $userName));

        return redirect()->route('admin.nonconformity-reports.index');
    }

    public function rejectByAdministrator(NonConformity $nonConformity, Request $request)
    {

        $authId = auth()->user()->id;


        $nonConformity->result_id = 7;
        $nonConformity->status = 'Close';
        $nonConformity->reason = $request->input('reason');

        $nonConformity->update();



        $comment = new CommentNonconformity();
        $comment->nr_id = $nonConformity->id;
        $comment->result_id = 8;
        $comment->description = $request->input('reason');
        $comment->name_id = $authId;
        $comment->save();

        // $users2 = DB::table('nonconformity_reports')
        //     ->join('users', 'nonconformity_reports.nama_pelapor_id', '=', 'users.id')
        //     ->where('nonconformity_reports.id', $nonConformity->id)
        //     ->select('users.*')->get();

        $toEmail = 'daniel.sinaga@kpi.co.id';
        $userName = 'Daniel Sinaga';



        $users_1 = NonConformity::join('users', 'users.id', '=', 'nonconformity_reports.nama_pelapor_id')
            ->where('nonconformity_reports.id', $nonConformity->id)->get();

        $toEmail = $users_1[0]->email;
        $username = $users_1[0]->name;



        $toEmail_1 = 'eman.sonda@kpi.co.id';
        $toEmail_2 = 'rahmatullah.gobel@kpi.co.id';
        $userName = 'Administrator';


        Mail::to($toEmail)->cc([$toEmail_1, $toEmail_2])->send(new MailNonConformityRejectedAdministrator($nonConformity, $username));

        $users_2 = NonConformity::join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
            ->where('nonconformity_reports.id', $nonConformity->id)->get();

        // $users2 = DB::table('incident_reports')
        //     ->join('users', 'incident_reports.reviewed_by_id', '=', 'users.id')
        //     ->where('incident_reports.id', $nonConformity->id)
        //     ->select('parent_id')->get();



        $users_3 = NonConformity::join('users', 'nonconformity_reports.assigned_to_id', 'users.id')
            ->join('role_user', 'role_user.user_id', 'users.id')
            ->join('users as level1', 'level1.id', 'users.parent_id')
            ->where('nonconformity_reports.id', $nonConformity->id)
            ->select('level1.name', 'level1.email')
            ->get();


        // $users_3 = DB::table('users')
        //     ->join('nonconformity_reports', 'nonconformity_reports.assigned_to_id', 'users.id')
        //     ->join('role_user', 'role_user.user_id', 'users.id')
        //     ->join('users as level1', 'level1.id', 'users.parent_id')
        //     ->where('nonconformity_reports.id', $nonConformity->id)
        //     ->select('level1.name', 'level1.email')
        //     ->get();


        // dd($users_3);
        foreach ($users_1 as $key => $user) {

            // Mail::to($user->email)->send(new MailNonConformityRejectedAdministrator($nonConformity, $user->name));
        }


        // $recipient_1 = $user_1[0]->email;
        // $userName = $users2[0]->name;


        // $users3 = DB::table('users')
        // ->where('users.id',$users2[0]->parent_id)->get();

        // Notification::send($toEmail, new NonConformityRejectedAdministrator($userName));

        // Notification::route('mail', $toEmail)->notify(new NonConformityRejectedAdministrator($nonConformity, $userName));
        // Notification::route('mail', $toEmail)->notify(new NonConformityDoneAllUser($nonConformity, $userName));

        // Mail::to($toEmail)->send(new MailNonConformityRejectedAdministrator($nonConformity, $userName));
        // Mail::to($toEmail)->send(new NonConformityRejectedAdministrator($userName));



        // Notification::sendNow();

        return redirect()->route('admin.nonconformity-reports.index');
    }

    public function rejectByAdministratorVerification(NonConformity $nonConformity, Request $request)
    {

        $authId = auth()->user()->id;


        $nonConformity->result_id = 8;
        $nonConformity->reason = $request->input('reason');

        $nonConformity->update();

        $users2 = DB::table('nonconformity_reports')
            ->join('users', 'nonconformity_reports.assigned_to_id', '=', 'users.id')
            ->where('nonconformity_reports.id', $nonConformity->id)
            ->select('users.*')->get();

        $toEmail = $users2[0]->email;
        $userName = $users2[0]->name;


        $comment = new CommentNonconformity();
        $comment->nr_id = $nonConformity->id;
        $comment->result_id = 8;
        $comment->description = $request->input('reason');
        $comment->name_id = $authId;
        $comment->save();


        // Notification::route('mail', $toEmail)->notify(new NonConformityRejectedAdministratorVerification($nonConformity, $userName));

        // Notification::route('mail', $toEmail)->notify(new NonConformityDoneAllUser($nonConformity, $userName));

        // Mail::to($toEmail)->send(new MyTestMail($userName));
        // Mail::to($toEmail)->send(new NonConformityRejectedAdministrator($userName));

        return redirect()->route('admin.nonconformity-reports.index');
    }

    public function getFilterReports(Request $request)
    {
        // $data = $request->all();

        $data = NonConformity::where('area_id', $request->location_ncr_id)
            ->orWhere('non_plant_location_id', $request->non_plant_location_id)
            ->orWhere('location_ncr_id', $request->area_id)
            ->orWhere('region_id', $request->region_ncr_id)
            ->orWhere('root_cause_id', $request->root_cause_id)
            ->get();

        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function calculateOverDueDate($dueDate){

        // $dueDate = Carbon::parse($dueDate)->format('Y-m-d H:i:s');
        $dueDate = Carbon::parse($dueDate)->format(config('panel.date_format') . ' ' . config('panel.time_format'));

        $currentDate = Carbon::now();

        if($currentDate->greaterThan($dueDate)){

            //Calculate the overdue days
            $overdueDays = $currentDate->diffInDays($dueDate);

            //Calculate the overdue days
            $overdueDate = $currentDate->subDays($overdueDays);

            return $overdueDate->toDateString();
        }

        return "Not Overdue";
    }

}

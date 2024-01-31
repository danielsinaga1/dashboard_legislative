<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreMyIncidentReportRequest;
use App\Http\Requests\UpdateMyIncidentReportRequest;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\Notifications\IncidentReport\IncidentReportAllUser;
use App\Notifications\IncidentReport\IncidentApprovalManager;
use App\Notifications\IncidentReport\IncidentActionManagerExecutor;
use App\Notifications\IncidentReport\IncidentApprovalSuperintendent;
use App\Notifications\IncidentReport\IncidentRejectedSuperintendent;
use App\Notifications\IncidentReport\IncidentRejectedManager;
use App\DesignationDepartment;
use App\RootCause;
use App\CategoryIncident;
use App\ClassificationIncident;
use App\IncidentReport;
use App\IncidentReportNotification;
use App\ChemicalRelease;
use App\ClassificationDetail;
use App\AreaIncident;
use App\DistributionIncident;
use App\RegionIncident;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIncidentReportRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MyIncidentReportController extends Controller
{

    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('my_incident_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $authDeptId = auth()->user()->dept_id;
        $authId = auth()->user()->id;
        $authNpk = auth()->user()->npk;

        $now = Carbon::now();

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

        // $incidentReports = IncidentReport::whereNotNull('action_by_id')->get();
        //    $start = Carbon::parse($request->start_date);
        //    $end = Carbon::parse($request->end_date);

        //    $filtered = IncidentReport::whereDate('created_at','<=',$end->format('m-d-y'))
        //    ->whereDate('created_at','>=',$start->format('m-d-y'))->get();

        // $from = DB::table('incident_reports')->
        //         where('incident_reports.id',1)->select('incident_reports.*')->get();


        // foreach($incidentReports as $incidentReport){
        //         $dateAssigned = $incidentReport->assigned_at;
        //         $indexReport = $incidentReport->no_laporan;
        //         $to = Carbon::createFromFormat('Y-m-d H:i:s', $now);
        //         $froms = Carbon::createFromFormat('Y-m-d H:i:s', $dateAssigned);
        //         $date1 = strtotime($dateAssigned);
        //         $date2 = strtotime($now);
        //         $diff = abs($date2 - $date1);

        //         $toDays = $to->day;
        //         $fromDays = $froms->day;
        //         $subtractionDays = $toDays - $fromDays;
        //         $hours = $subtractionDays * 24;
        //     }


        // $results = $from[0]->assigned_at;

        // $to = Carbon::createFromFormat('Y-m-d H:i:s',$now);
        // $froms = Carbon::createFromFormat('Y-m-d H:i:s',$results);

        // $date1 = strtotime($results);
        // $date2 = strtotime($now);
        // $diff = abs($date2 - $date1);

        // $toDays = $to->day;
        // $fromDays = $froms->day;

        // $subtractionDays = $toDays - $fromDays;

        // $hours = $subtractionDays * 24;

        $queryClassifys = DB::table('classification_incidents')
        ->join('incident_reports', 'incident_reports.classify_id', '=', 'classification_incidents.id')
        ->select('incident_reports.*','classification_incidents.id as x')->get();

        $queryIncidents = DB::table('incident_reports')
        ->join('classification_incidents', 'incident_reports.classify_id', '=', 'classification_incidents.id')
        ->join('users','incident_reports.nama_pelapor_id','users.id')
        ->join('users as level1','level1.id','users.parent_id')
        ->join('users as level2','level2.id','level1.parent_id')
        ->select('incident_reports.*','classification_incidents.id as x','users.name as nama_pengguna','level1.id as level1','level2.id as level2')->get();

        // // To get the year divide the resultant date into
        // // total seconds in a year (365*60*60*24)
        // $years = floor($diff / (365*60*60*24));

        // // To get the month, subtract it with years and
        // // divide the resultant date into
        // // total seconds in a month (30*60*60*24)
        // $months = floor(($diff - $years * 365*60*60*24)
        // / (30*60*60*24));

        // // Formulate the Difference between two dates
        // $days = floor(($diff - $years * 365*60*60*24 -
        //      $months*30*60*60*24)/ (60*60*24));

        // $hours = floor(($diff - $years * 365*60*60*24 -
        //      $months*30*60*60*24 - $days*60)/ (60*60));

        // $hours2 = floor((($diff) % (60 * 60 * 24)) / 60 * 60);

            // $times = $queryIncident->created_at;


            // dump($hours10);
            // if($queryIncident->x == 5 && $hours > 1 && $queryIncident->reviewed_by_id !== NULL){
            //     // $queryIncident->reviewed_by_id = $queryIncident->level1;
            //     // $queryIncident->update();
            //     echo("Test 1");
            // }
            // elseif($queryIncident->x == 5 && $hours > 2 && $queryIncident->acknowledged_by_id === NULL){
            //     // $queryIncident->acknowledged_by_id = $queryIncident->level2;
            //     // $queryIncident->update();
            //     echo("Test 2");
            // }
            // elseif($queryIncident->x == 4 && $hours > 2 && $queryIncident->reviewed_by_id === NULL){
            //     echo("Test 3");
            // }
            // elseif($queryIncident->x == 4 && $hours > 4 && $queryIncident->acknowledged_by_id === NULL){
            //     echo("Test 4");
            // }
            // elseif($queryIncident->x == 3 && $hours > 6 && $queryIncident->reviewed_by_id === NULL) {
            //     echo("Test 5");
            // }
            // elseif($queryIncident->x == 3 && $hours > 12 && $queryIncident->acknowledged_by_id === NULL) {
            //     echo("Test 6");
            // }
            // elseif($queryIncident->x == 2 && $hours > 12 && $queryIncident->reviewed_by_id === NULL) {
            //     echo("Test 7");
            // }
            // elseif($queryIncident->x == 2 && $hours > 24 && $queryIncident->acknowledged_by_id === NULL) {
            //     echo("Test 8");
            // }
            // elseif($queryIncident->x == 1 && $hours > 24 && $queryIncident->acknowledged_by_id !== NULL) {
            //     echo("Test 9");
            // }
            // elseif($queryIncident->x == 1 && $hours > 48 && $queryIncident->acknowledged_by_id !== NULL) {
            //     echo("Test 10");
            // }

            // if($queryIncident->x === 1 && $queryIncident->reviewed_by_id !== NULL ){
            //     dump($hours10);
            //     echo('Ini yang pertama');
            // }
            // elseif($queryIncident->x === 2 && $queryIncident->reviewed_by_id !== NULL){
            //     dump($hours10);
            //     echo('Ini yang kedua');
            // }
            // elseif($queryIncident->x === 3 && $queryIncident->reviewed_by_id !== NULL){
            //     dump($hours10);
            //     echo('Ini yang ketiga');
            // }
            // elseif($queryIncident->x === 4 && $queryIncident->reviewed_by_id !== NULL){
            //     dump($hours10);
            //     echo('Ini yang keempat');
            // }
            // elseif($queryIncident->x === 5 && $queryIncident->reviewed_by_id !== NULL){
            //     echo('Ini yang kelima');
            // }



        // $dataSpdt = DB::table('incident_reports')
        //              ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
        //              ->join('media', 'media.model_id', '=', 'incident_reports.id')
        //              ->where('parent_id',$authId)
        //              ->select('incident_reports.*')->get();

        // $users2 = DB::table('incident_reports')
        //              ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
        //              ->where('incident_reports.id',$incidentReport->id)
        //              ->select('parent_id')->get();


        // $dataSpdt =IncidentReport::with(['nama_pelapor' => function ($query){
        //     $query->where('parent_id', auth()->user()->id);
        // },'dept_origin'])->where('result_id',4)->orWhere('nama_pelapor_id',$authId)->where('dept_origin_id',$authDeptId)->get();

        // $dataSpdt =IncidentReport::with(['nama_pelapor' => function ($query) use($authId){
        //     $query->where('parent_id', $authId);
        // },'dept_origin'])->where('result_id',4)->where('dept_origin_id',$authDeptId)->get();

        // $dataSpdt5 = IncidentReport::join('media',$dataSpdt4->incidentReport->id,'media.model_id')->get();
        // foreach($dataSpdt4 as $item){
        //     // dump($item->id);
        //     $dataSpdt5 = IncidentReport::join('media','media.model_id','incident_reports.id',$item->id)->get();
        //     dump($dataSpdt5);
        // }
        //    $dataSpdt2 = DB::table('incident_reports')
        //              ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
        //              ->join('media', 'media.model_id', '=', 'incident_reports.id')
        //              ->where('parent_id',$authId)->orWhere('nama_pelapor_id',$authId)
        //              ->where('incident_reports.result_id',4)
        //              ->select('incident_reports.*','media.*')->get();

        // $users =IncidentReport::with(['nama_pelapor' => function ($query) use($authId){
        //     $query->where('parent_id', $authId);
        // }])->where('result_id',4)->get();

        if(auth()->user()->is_initiator || auth()->user()->is_administrator2){
            $incidentReports = IncidentReport::where('nama_pelapor_id', $authId)->with('nama_pelapor')->get();
            // dd($incidentReports);
        }
        // elseif(auth()->user()->is_superintendent){
        //     $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
        //         $query->where('parent_id',auth()->user()->id);
        //     })->orWhere('nama_pelapor_id',$authId)->get();

        //     // $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
        //     //     $query->where('parent_id',auth()->user()->id);
        //     // })->where(function($q) use($authId) {
        //     //     $q->orWhere('nama_pelapor_id', $authId)->
        //     //       where('status', 'Open');
        //     // })->get();

        // }
        elseif(auth()->user()->is_superintendent || auth()->user()->is_superadministrator || auth()->user()->is_administrator){
            //Filoyak Josua Sinaga
            if($authNpk == 1501321){
                $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                    $query->where('parent_id',auth()->user()->id);
                })->orWhere('ri_id', 2)->orWhere('nama_pelapor_id',$authId)->get();

                //Gihon Andre Asmitra Harahap
            }elseif($authNpk == '1302286') {
                $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                    $query->where('parent_id',auth()->user()->id);
                })->where('ri_id', 1)->orWhere('nama_pelapor_id',$authId)->get();

            }else {
                $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                    $query->where('parent_id',auth()->user()->id);
                })->orWhere('nama_pelapor_id',$authId)->get();
            }

            // $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
            //     $query->where('parent_id',auth()->user()->id);
            // })->where(function($q) use($authId) {
            //     $q->orWhere('nama_pelapor_id', $authId)->
            //       where('status', 'Open');
            // })->get();

        }
        elseif(auth()->user()->is_manager){
            if($authNpk == '0902229'){
                $incidentReports =IncidentReport::with(['dept_origin'])->where('dept_origin_id',$authDeptId)->get();
            }
            else{
                $incidentReports =IncidentReport::with(['dept_origin'])->where('dept_origin_id',$authDeptId)->where('result_id','!=', 4)->orWhere('nama_pelapor_id',$authId)->get();
            }
        }elseif(auth()->user()->is_admin){
            $incidentReports = IncidentReport::all();
        }

    //    $user10 = User::where('id',auth()->user()->id)->get();

    //    dd($user10->userIncidentReports->first()->pivot->incident_link);

    //    foreach ($user10->userIncidentReports1 as $userIncident) {
    //        dump($userIncident->pivot->incident_link);
    //    }

    //    die();
        // $user10 = DB::table('users')->join('incident_reports','incident_reports_dept_')
            // Notification::send($users, new IncidentApprovalSuperintendent($incidentReports));

        return view('admin.myIncidentReports.index', compact('incidentReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('my_incident_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dept_designations = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region_incidents = RegionIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chemical_releases = ChemicalRelease::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $category_incidents = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classification_incidents = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //Matrix Incident Report
        $matrixs = ClassificationDetail::orderBy('classification_id')->orderBy('category_id')->get();
        $rows = [];
        $columns = [];

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

        // $test10 = Auth::user()->userIncidentReports()->where('content', NULL)->get();

        // dd($test10);
        return view('admin.myIncidentReports.create', compact('root_causes','dept_designations','category_incidents','classification_incidents','chemical_releases','area_incidents','matrixs','rows','columns','region_incidents'));
    }

    public function store(StoreMyIncidentReportRequest $request)
    {
        $data = $request->all();
        // dd($request->date_incident);
        $year = Carbon::now()->format('y');
        $month = Carbon::now()->format('m');

        if(empty($data['ri_id'])){
            unset($data['ri_id']);
        }

        $nextNumberReport = "LI-". $month . $year . "-" . IncidentReport::getNextNumberReport();
        $data['status'] = 'Open';
        $data['no_laporan'] = $nextNumberReport;
        // $data['date_incident'] = date('Y-m-d H:i:s',strtotime($request->date_incident));
        // $data['date_incident'] = Carbon::parse(config('panel.date_format') . ' ' . config('panel.time_format'), $request->date_incident)->format('Y-m-d H:i:s');


        if(auth()->user()->is_manager){
            $data['nama_pelapor_id'] = auth()->id();
            $data['dept_origin_id'] = Auth::user()->dept_id;
            $data['result_id'] = 2;
            $data['reviewed_by_id'] = auth()->id();
            $data['acknowledged_by_id'] = auth()->id();
            $data['reviewed_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $data['acknowledged_at'] = Carbon::now()->format('Y-m-d H:i:s');
        }
        elseif(auth()->user()->is_superintendent || auth()->user()->is_administrator || auth()->user()->is_superadministrator){
            $data['nama_pelapor_id'] = auth()->id();
            $data['dept_origin_id'] = Auth::user()->dept_id;
            $data['result_id'] = 1;
            $data['reviewed_by_id'] = auth()->id();
            $data['reviewed_at'] = Carbon::now()->format('Y-m-d H:i:s');
        }
        elseif(auth()->user()->is_initiator || auth()->user()->is_administrator2){
            $data['nama_pelapor_id'] = auth()->id();
            $data['dept_origin_id'] = Auth::user()->dept_id;
            $data['result_id'] = 4;

        }

        $incidentReport = IncidentReport::create($data);

        if(auth()->user()->is_initiator || auth()->user()->is_administrator2){
            $distribution_incident = new DistributionIncident();
            $distribution_incident->ir_id = $incidentReport->id;
            $distribution_incident->status = 'Open';
            $distribution_incident->result_id = 4;
            $distribution_incident->description = 'Created';
            $distribution_incident->name_id = auth()->user()->id;
            $distribution_incident->save();
        }elseif(auth()->user()->is_superintendent || auth()->user()->is_superadministrator || auth()->user()->is_administrator){
            $distribution_incident = new DistributionIncident();
            $distribution_incident->ir_id = $incidentReport->id;
            $distribution_incident->result_id = 4;
            $distribution_incident->status = 'Open';
            $distribution_incident->description = 'Created';
            $distribution_incident->name_id = auth()->user()->id;
            $distribution_incident->save();

            if(isset($distribution_incident->result_id)){
            $distribution_incident = new DistributionIncident();
            $distribution_incident->ir_id = $incidentReport->id;
            $distribution_incident->result_id = 1;
            $distribution_incident->status = 'Open';
            $distribution_incident->description = 'Approved';
            $distribution_incident->name_id = auth()->user()->id;
            $distribution_incident->save();
            }

        }elseif(auth()->user()->is_manager){
            $distribution_incident = new DistributionIncident();
            $distribution_incident->ir_id = $incidentReport->id;
            $distribution_incident->result_id = 4;
            $distribution_incident->status = 'Open';
            $distribution_incident->description = 'Created';
            $distribution_incident->name_id = auth()->user()->id;
            $distribution_incident->save();

            if(isset($distribution_incident->result_id)){
                $distribution_incident = new DistributionIncident();
                $distribution_incident->ir_id = $incidentReport->id;
                $distribution_incident->result_id = 1;
                $distribution_incident->status = 'Open';
                $distribution_incident->description = 'Approved';
                $distribution_incident->name_id = auth()->user()->id;
                $distribution_incident->save();

                $distribution_incident = new DistributionIncident();
                $distribution_incident->ir_id = $incidentReport->id;
                $distribution_incident->result_id = 2;
                $distribution_incident->status = 'Open';
                $distribution_incident->description = 'Approved';
                $distribution_incident->name_id = auth()->user()->id;
                $distribution_incident->save();
                }
        }

        // // $incidentReport->users()->sync($data['nama_pelapor_id']);
        // $incidentReport->users()->sync(auth()->user()->parent_id);

        // $incidentReport->users()->attach(auth()->user()->parent_id, ['content' => $data['no_laporan'],
        //                                                              'incident_link' => url()->current()]);

        // $incidentReport->users()->sync($data);

        foreach ($request->input('photos', []) as $file) {
            $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        foreach ($request->input('file', []) as $file) {
            $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
        }

        foreach ($request->input('file_initiator', []) as $file) {
            $incidentReport->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file_initiator');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $incidentReport->id]);
        }
        // $user = Users::join('incident_reports', 'nama_pelapor_id', '=', 'users.id')->where('incident_reports.id', $incidentReport->id)->first();

        $users2 = DB::table('incident_reports')
                     ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
                     ->where('incident_reports.id',$incidentReport->id)
                     ->select('parent_id')->get();

        $users3 = DB::table('users')
                ->where('users.id',$users2[0]->parent_id)->get();
        // foreach($users2 as $value){
        //    $test = $value->parent_id;

        // }
        // $user3 = DB::table('users')
        //             ->where('users.id',$test)->get();

        $toEmail = $users3[0]->email;
        $userName = $users3[0]->name;

        $search = 'Manager';

        $users4 = DB::table('users')
        ->join('incident_reports','users.dept_id','=','incident_reports.dept_designated_id')
        ->join('job_titles','users.job_id','=','job_titles.id')
        ->where('job_titles.name','LIKE','%'. $search . '%')
        ->where('incident_reports.id',$incidentReport->id)
        ->select('users.*')->get();

        $toEmail2 = $users4[0]->email;
        $userName2 = $users4[0]->name;


        $roleSuperintendent = DB::table('users')
                ->join('incident_reports','incident_reports.nama_pelapor_id','users.id')
                ->join('role_user','role_user.user_id','users.id')
                ->join('users as level1','level1.id','users.parent_id')
                ->where('incident_reports.id',$incidentReport->id)
                ->select('users.name','level1.name as superior')
                ->get();


        // if(auth()->user()->is_initiator) {
        //     if($incidentReport->classify->id == 1){
        //         $duration = 24;
        //     }
        //     elseif($incidentReport->classify->id == 2){
        //         $duration = 12;
        //     }
        //     elseif($incidentReport->classify->id == 3){
        //         $duration = 6;
        //     }
        //     elseif($incidentReport->classify->id == 4){
        //         $duration = 2;
        //     }
        //     elseif($incidentReport->classify->id == 5){
        //         $duration = 1;
        //     }

        //     Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$duration));
        // }

        // if(auth()->user()->is_superintendent){
        //     Notification::route('mail',$toEmail)->notify(new IncidentApprovalManager($incidentReport,$userName));
        // }
        // elseif(auth()->user()->is_initiator){
        //     Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName));
        // }
        // elseif(auth()->user()->is_manager){
        //     Notification::route('mail',$toEmail2)->notify(new IncidentActionManagerExecutor($incidentReport,$userName2));
        // }

        if(auth()->user()->is_superintendent || auth()->user()->is_superadministrator){
            $timesReviewed = $incidentReport->reviewed_at;

            if($incidentReport->classify->id == 1){
                // $convertTimeReviewed = date("Y-m-d H:i:s", strtotime("+24 hours", strtotime($timesReviewed)));

                $convertTimeReviewed = date("Y-m-d H:i:s", strtotime("+24 hours", strtotime($timesReviewed)));

                $convertTimeReviewedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeReviewed)));


                // $parseHours = Carbon::parse($timesReviewed)->format('d-m-Y H:i:s');
                $parseHours = Carbon::parse($convertTimeReviewedStringReplace)->format('d-m-Y H:i:s');

                //Kirim Approval Atasan Langsung
                // Notification::route('mail',$toEmail)->notify(new IncidentApprovalManager($incidentReport,$userName,$parseHours));


            }elseif ($incidentReport->classify->id == 2) {
                $convertTimeReviewed = date("Y-m-d H:i:s", strtotime("+12 hours", strtotime($timesReviewed)));

                $convertTimeReviewedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeReviewed)));


                $parseHours = Carbon::parse($convertTimeReviewedStringReplace)->format('d-m-Y H:i:s');
                //Kirim Approval Atasan Langsung
                // Notification::route('mail',$toEmail)->notify(new IncidentApprovalManager($incidentReport,$userName,$parseHours));
            }else{
                // Notification::route('mail',$toEmail)->notify(new IncidentApprovalManager($incidentReport,$userName));
            }
        }

        elseif(auth()->user()->is_initiator || auth()->user()->is_administrator2){
            $timeCreated = $incidentReport->created_at;

            if ($incidentReport->ri_id == 1) {
                if($incidentReport->classify->id == 1){
                    $convertTimeCreated = date("Y-m-d H:i:s", strtotime("+24 hours", strtotime($timeCreated)));
                    $convertTimeCreatedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeCreated)));
                    // dd($convertTimeCreatedStringReplace);


                    // $parseHours = Carbon::parse($convertTimeCreated)->format('d-m-Y H:i:s');


                    $parseHours = Carbon::parse($convertTimeCreatedStringReplace)->format('d-m-Y H:i:s');
                    //Kirim Approval Superintendent
                    // Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$parseHours));
                }elseif ($incidentReport->classify->id == 2) {
                    $convertTimeCreated = date("Y-m-d H:i:s", strtotime("+12 hours", strtotime($timeCreated)));
                    $convertTimeCreatedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeCreated)));

                    $parseHours = Carbon::parse($convertTimeCreatedStringReplace)->format('d-m-Y H:i:s');

                    // $parseHours = Carbon::parse($convertTimeCreated)->format('d-m-Y H:i:s');

//Kirim Approval Superintendent
                    // Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$parseHours));
                }else{
                    // Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName));
                }
            } elseif($incidentReport->ri_id == 2) {
                $usersUtilitySuperintendents = DB::table('users')->where('npk', 1102251)->select('users.*')->get();
                foreach($usersUtilitySuperintendents as $usersUtilitySuperintendent){
                    $userName = $usersUtilitySuperintendent->name;
                    $toEmailUtilitySpdt = $usersUtilitySuperintendent->email;

                    if($incidentReport->classify->id == 1){
                        $convertTimeCreated = date("Y-m-d H:i:s", strtotime("+24 hours", strtotime($timeCreated)));

                        $convertTimeCreatedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeCreated)));

                        $parseHours = Carbon::parse($convertTimeCreatedStringReplace)->format('d-m-Y H:i:s');

                        // $parseHours = Carbon::parse($convertTimeCreated)->format('d-m-Y H:i:s');
                        //Kirim Approval Superintendent
                        // Notification::route('mail',$toEmailUtilitySpdt)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$parseHours));
                    }elseif($incidentReport->classify->id == 2){
                        $convertTimeCreated = date("Y-m-d H:i:s", strtotime("+12 hours", strtotime($timeCreated)));

                        $convertTimeCreatedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeCreated)));
                        $parseHours = Carbon::parse($convertTimeCreatedStringReplace)->format('d-m-Y H:i:s');

                        // $parseHours = Carbon::parse($convertTimeCreated)->format('d-m-Y H:i:s');
                        //Kirim Approval Superintendent
                        // Notification::route('mail',$toEmailUtilitySpdt)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$parseHours));
                    }else{
                        // Notification::route('mail',$toEmailUtilitySpdt)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName));
                    }
                }
            }elseif($incidentReport->ri_id == NULL){
                if($incidentReport->classify->id == 1){
                    $convertTimeCreated = date("Y-m-d H:i:s", strtotime("+24 hours", strtotime($timeCreated)));

                    $convertTimeCreatedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeCreated)));
                        $parseHours = Carbon::parse($convertTimeCreatedStringReplace)->format('d-m-Y H:i:s');


                    // $parseHours = Carbon::parse($convertTimeCreated)->format('d-m-Y H:i:s');
                    //Kirim Approval Superintendent
                    // Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$parseHours));
                }elseif($incidentReport->classify->id == 2){
                    $convertTimeCreated = date("Y-m-d H:i:s", strtotime("+12 hours", strtotime($timeCreated)));

                    $convertTimeCreatedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeCreated)));
                    $parseHours = Carbon::parse($convertTimeCreatedStringReplace)->format('d-m-Y H:i:s');

                    // $parseHours = Carbon::parse($convertTimeCreated)->format('d-m-Y H:i:s');
                    //Kirim Approval Superintendent
                    // Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName,$parseHours));
                }else{
                    // Notification::route('mail',$toEmail)->notify(new IncidentApprovalSuperintendent($incidentReport,$userName));
                }
            }
        }
        elseif(auth()->user()->is_manager){
            $timesAcknowledged = $incidentReport->acknowledged_at;
            if($incidentReport->classify->id == 1){
                $convertTimeAcknowledged = date("Y-m-d H:i:s", strtotime("+24 hours", strtotime($timesAcknowledged)));

                $convertTimeAcknowledgedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeAcknowledged)));
                $parseHours = Carbon::parse($convertTimeAcknowledgedStringReplace)->format('d-m-Y H:i:s');

                // $parseHours = Carbon::parse($convertTimeAcknowledged)->format('d-m-Y H:i:s');
                //Kirim Approval Atasan Langsung
                // Notification::route('mail',$toEmail2)->notify(new IncidentActionManagerExecutor($incidentReport,$userName,$parseHours));
            }elseif($incidentReport->classify->id == 2){
                $convertTimeAcknowledged = date("Y-m-d H:i:s", strtotime("+12 hours", strtotime($timesAcknowledged)));

                $convertTimeAcknowledgedStringReplace = date("Y-m-d H:i:s", strtotime(str_replace('-','/', $convertTimeAcknowledged)));
                $parseHours = Carbon::parse($convertTimeAcknowledgedStringReplace)->format('d-m-Y H:i:s');

                // $parseHours = Carbon::parse($convertTimeAcknowledged)->format('d-m-Y H:i:s');
                //Kirim Approval Atasan Langsung
                // Notification::route('mail',$toEmail2)->notify(new IncidentActionManagerExecutor($incidentReport,$userName,$parseHours));
            }else{
                // Notification::route('mail',$toEmail2)->notify(new IncidentActionManagerExecutor($incidentReport,$userName));
            }
        }

        return redirect()->route('admin.my-incident-reports.index');
    }

    public function edit(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('my_incident_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dept_designations = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chemical_releases = ChemicalRelease::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $category_incidents = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classification_incidents = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','area','chemical');

        return view('admin.myIncidentReports.edit', compact('incidentReport','root_causes','category_incidents','classification_incidents','dept_designations','chemical_releases','area_incidents'));
    }

    public function update(UpdateMyIncidentReportRequest $request, IncidentReport $incidentReport)
    {
        $incidentReport->update($request->all());


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

        return redirect()->route('admin.my-incident-reports.index');
    }

    public function show(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('my_incident_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','action_by','chemical','area');

        $distribution_incidents = DistributionIncident::where('ir_id',$incidentReport->id)->get();

        return view('admin.myIncidentReports.show', compact('incidentReport','distribution_incidents'));
    }

    public function destroy(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('my_incident_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('my_incident_report_create') && Gate::denies('my_incident_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new IncidentReport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function approveBySuperintendent(IncidentReport $incidentReport, Request $request) {

        $incidentReport->result_id=1;
        $incidentReport->reviewed_by_id=auth()->user()->id;
        $incidentReport->reviewed_at = Carbon::now()->format('Y-m-d H:i:s');
        $incidentReport->update();


        $distribution_incident = new DistributionIncident();
        $distribution_incident->ir_id = $incidentReport->id;
        $distribution_incident->name_id = auth()->user()->id;
        $distribution_incident->result_id = 1;
        $distribution_incident->description = 'Approved';
        $distribution_incident->status = 'Open';
        $distribution_incident->save();

        // $incidentReport->update(['result_id' => 1,
        // 'reviewed_by_id' => auth()->user()->id
        // ]);
        $users2 = DB::table('incident_reports')
        ->join('users', 'incident_reports.reviewed_by_id', '=', 'users.id')
        ->where('incident_reports.id',$incidentReport->id)
        ->select('parent_id')->get();

        $users3 = DB::table('users')
        ->where('users.id',$users2[0]->parent_id)->get();

        $toEmail = $users3[0]->email;
        $userName = $users3[0]->name;

        // if($incidentReport->classify->id == 1){
        //     $duration = 24;
        // }
        // elseif($incidentReport->classify->id == 2){
        //     $duration = 12;
        // }
        // elseif($incidentReport->classify->id == 3){
        //     $duration = 6;
        // }
        // elseif($incidentReport->classify->id == 4){
        //     $duration = 2;
        // }
        // elseif($incidentReport->classify->id == 5){
        //     $duration = 1;
        // }
        // Notification::route('mail',$toEmail)->notify(new IncidentApprovalManager($incidentReport,$userName,$duration));

        Notification::route('mail',$toEmail)->notify(new IncidentApprovalManager($incidentReport,$userName));
        return redirect()->route('admin.my-incident-reports.index');
    }
    public function approveByManager(IncidentReport $incidentReport) {

        $data= IncidentReport::whereNotNull('reviewed_by_id')->get();

        if(auth()->user()->npk == '0902229'){
            $incidentReport->result_id = 2;
            $incidentReport->reviewed_by_id = auth()->user()->id;
            $incidentReport->acknowledged_by_id = auth()->user()->id;
            $incidentReport->reviewed_at = Carbon::now()->format('Y-m-d H:i:s');
            $incidentReport->acknowledged_at = Carbon::now()->format('Y-m-d H:i:s');
            $incidentReport->update();
        }
        elseif($data) {
            $incidentReport->result_id = 2;
            $incidentReport->acknowledged_by_id = auth()->user()->id;
            $incidentReport->acknowledged_at = Carbon::now()->format('Y-m-d H:i:s');;
            $incidentReport->update();
        }

        $distribution_incident=new DistributionIncident();
        $distribution_incident->ir_id=$incidentReport->id;
        $distribution_incident->name_id=auth()->user()->id;
        $distribution_incident->result_id=2;
        $distribution_incident->description='Approved';
        $distribution_incident->status='Open';
        $distribution_incident->save();
        // $users2 = DB::table('users')
        // ->join('incident_reports','users.dept_id','=','incident_reports.designated_id')
        // ->join('role_user','users.id','=','role_user.user_id')
        // ->join('roles','roles.id','=','role_user.role_id')
        // ->where('roles.id', 6)
        // ->select('users.name')->get();
        // $toEmail = $users2[0]->email;

        $search = 'Manager';
        $users2 = DB::table('users')
        ->join('incident_reports','users.dept_id','=','incident_reports.dept_designated_id')
        ->join('job_titles','users.job_id','=','job_titles.id')
        ->where('job_titles.name','LIKE','%'. $search . '%')
        ->where('incident_reports.id',$incidentReport->id)
        ->select('users.*')->get();

        $toEmail = $users2[0]->email;
        $userName = $users2[0]->name;


        //Email untuk Manager Executor
        Notification::route('mail',$toEmail)->notify(new IncidentActionManagerExecutor($incidentReport,$userName));
        // Notification::route('mail',$toEmail2)->notify(new IncidentActionManagerExecutor($incidentReport,$userName));
        if($incidentReport->area->id === 1){

            $users10 = DB::table('users')
            ->join('area_user','users.id','=','area_user.user_id')
            ->where('area_user.area_id', 1)
            ->select('name', 'email')->get();


            foreach($users10 as $value){
                $emailUser = $value->email;
                $userName = $value->name;
                Notification::route('mail',$emailUser)->notify(new IncidentReportAllUser($incidentReport,$userName));
            }

        }elseif($incidentReport->area->id === 2){

            $users10 = DB::table('users')
            ->join('area_user','users.id','=','area_user.user_id')
            ->where('area_user.area_id', 2)
            ->select('name','email')->get();

            foreach($users10 as $value){
                $emailUser = $value->email;
                $userName = $value->name;
                Notification::route('mail',$emailUser)->notify(new IncidentReportAllUser($incidentReport,$userName));
            }
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
        //   foreach($users4 as $r){
        //     $result = $r->email;
        //     $username = $r->name;
        //     Notification::route('mail',$result)->notify(new IncidentReportAllManager($incidentReport,$username));
        //     }

        // $users3 = DB::table('users')
        // ->where('users.id',$users2[0]->parent_id)->get();



        // $toEmail2 = $users4[0]->email;
        // $userName2 = $users4[0]->name;



        return redirect()->route('admin.my-incident-reports.index');

    }


public function rejectBySuperintendent(IncidentReport $incidentReport, Request $request) {

    $incidentReport->result_id = 3;
    $incidentReport->status = 'Close';
    $incidentReport->reason = $request->input('reason');
    $incidentReport->reviewed_by_id=auth()->user()->id;
    $incidentReport->reason = $request->input('reason');
    $incidentReport->reviewed_at = Carbon::now()->format('Y-m-d H:i:s');
    $incidentReport->update();

    $distribution_incident = new DistributionIncident();
    $distribution_incident->ir_id = $incidentReport->id;
    $distribution_incident->result_id = 3;
    $distribution_incident->status = 'Close';
    $distribution_incident->description = 'Rejected';
    $distribution_incident->name_id = auth()->user()->id;
    $distribution_incident->save();

    $users2 = DB::table('incident_reports')
    ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
    ->where('incident_reports.id',$incidentReport->id)
    ->select('users.*')->get();

    // $users3 = DB::table('users')
    // ->where('users.id',$users2[0]->parent_id)->get();

    $toEmail = $users2[0]->email;
    $userName = $users2[0]->name;

    Notification::route('mail',$toEmail)->notify(new IncidentRejectedSuperintendent($incidentReport,$userName));
    return redirect()->route('admin.my-incident-reports.index');
}

public function rejectByManager(IncidentReport $incidentReport, Request $request) {

    if(auth()->user()->npk == '0902229'){
        $incidentReport->result_id=3;
        $incidentReport->status = 'Close';
        $incidentReport->reason = $request->input('reason');
        $incidentReport->acknowledged_by_id=auth()->user()->id;
        $incidentReport->reviewed_by_id = auth()->user()->id;
        $incidentReport->acknowledged_at = Carbon::now()->format('Y-m-d H:i:s');
        $incidentReport->reviewed_at = Carbon::now()->format('Y-m-d H:i:s');
        $incidentReport->update();

        $distribution_incident = new DistributionIncident();
        $distribution_incident->ir_id = $incidentReport->id;
        $distribution_incident->result_id = 3;
        $distribution_incident->status = 'Close';
        $distribution_incident->description = 'Rejected';
        $distribution_incident->name_id = auth()->user()->id;
        $distribution_incident->save();
    }else{
        $incidentReport->result_id=3;
        $incidentReport->status = 'Close';
        $incidentReport->reason = $request->input('reason');
        $incidentReport->acknowledged_by_id=auth()->user()->id;
        $incidentReport->acknowledged_at = Carbon::now()->format('Y-m-d H:i:s');
        $incidentReport->update();

        $distribution_incident = new DistributionIncident();
        $distribution_incident->ir_id = $incidentReport->id;
        $distribution_incident->result_id = 3;
        $distribution_incident->status = 'Close';
        $distribution_incident->description = 'Rejected';
        $distribution_incident->name_id = auth()->user()->id;
        $distribution_incident->save();
    }

    $users2 = DB::table('incident_reports')
    ->join('users', 'incident_reports.nama_pelapor_id', '=', 'users.id')
    ->where('incident_reports.id',$incidentReport->id)
    ->select('users.*')->get();

    $toEmail = $users2[0]->email;
    $userName = $users2[0]->name;

    Notification::route('mail',$toEmail)->notify(new IncidentRejectedManager($incidentReport,$userName));
    return redirect()->route('admin.my-incident-reports.index');
}


public function approve($user_id)
{
    $incidentReport = IncidentReport::findOrFail($user_id);
    $incidentReport->update(['approved_at' => now()]);

    return redirect()->route('admin.my-incident-reports.index')->withMessage('User approved successfully');
}

private function checkAccessRights(IncidentReport $incidentReport, $receiver_id)
    {
        $user = Auth::user();

        if ($incidentReport->nama_pelapor_id !== $user->id && $receiver_id !== $user->id) {
            return abort(401);
        }
    }

    // public function read(Request $request)
    // {
    //     $incidentReports = Auth::user()->userIncidentReports()->where('read', false)->get();

    //     foreach ($incidentReports as $incidentReport) {
    //         $pivot       = $incidentReport->pivot;
    //         $pivot->read = true;
    //         $pivot->read_at = Carbon::now();
    //         $pivot->save();
    //     }
    // }
}

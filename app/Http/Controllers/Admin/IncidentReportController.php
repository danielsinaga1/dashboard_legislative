<?php

namespace App\Http\Controllers\Admin;

use App\CategoryIncident;
use App\ClassificationIncident;
use App\DesignationDepartment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyIncidentReportRequest;
use App\Http\Requests\StoreIncidentReportRequest;
use App\Http\Requests\UpdateIncidentReportRequest;
use App\IncidentReport;
use App\RootCause;
use App\ChemicalRelease;
use App\InvestigationDetail;
use App\AreaIncident;
use Illuminate\Support\Facades\Gate;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class IncidentReportController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('incident_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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


        $incidentReports = IncidentReport::whereNotNull('acknowledged_by_id')->get();

        $datedatenow = Carbon::now();
        $datedateyesterday = Carbon::yesterday();

        $d1 = strtotime($datedatenow);
        $d2 = strtotime($datedateyesterday);

        // $diff_in_days = $d1->diffInDays($d2);


        $formatted_dt1=Carbon::parse($d1);

        $formatted_dt2=Carbon::parse($d2);

$date_diff=$formatted_dt1->diffInDays($formatted_dt2);



        foreach ($incidentReports as $incidentReport) {

            $now = Carbon::now();
            $timesAssigned = $incidentReport->assigned_at;
            $timesApprovedFully = $incidentReport->acknowledged_at;


        $dateAssigned =  date('Y-m-d H:i:s', strtotime($timesAssigned));
        $dateApprovedFully = date('Y-m-d H:i:s', strtotime($timesApprovedFully));
        $dateNow = date('Y-m-d H:i:s', strtotime($now));




          $datedateNow=Carbon::parse($dateNow);

         $datedateAssigned=Carbon::parse($dateAssigned);

        $date_diff=$datedateNow->diffInDays($datedateAssigned);


            // $hoursAssigned = floor(abs($dateNow - $dateAssigned) / (60 * 60));

            // $hoursAssigned = $dateNow->diff($dateAssigned);

            // $hoursApprovedFully = floor(abs($dateNow - $dateApprovedFully) / (60 * 60));


        }

        //    $start = Carbon::parse($request->start_date);

        //    $end = Carbon::parse($request->end_date);

        //    $filtered = IncidentReport::whereDate('created_at','<=',$end->format('m-d-y'))
        //    ->whereDate('created_at','>=',$start->format('m-d-y'))->get();

           if(auth()->user()->is_admin || auth()->user()->is_administrator || auth()->user()->is_administrator2){
                if(!empty($request->date_filter)){
                $incidentReports = IncidentReport::whereBetween('date_incident', [$date_from, $date_to])->orWhereBetween('date_action', [$date_from, $date_to])->get();
                 }
                 else{

                    $incidentReports = IncidentReport::orderBy('id','desc')->get();


                // $incidentReports = DB::table('incident_reports')
                // ->join('classification_incidents', 'incident_reports.classify_id', '=', 'classification_incidents.id')
                // ->join('category_incidents', 'incident_reports.category_id', '=', 'category_incidents.id')
                // ->join()
                // ->join('users as level1','level1.id','users.parent_id')
                // ->join('users as level2','level2.id','level1.parent_id')
                // ->select('incident_reports.*','classification_incidents.id as x','users.name as nama_pengguna','level1.id as level1','level2.id as level2')->get();

                 }
           }else{
                if(!empty($request->date_filter)){
                $incidentReports = IncidentReport::where('result_id',2)->orWhere('result_id',5)->orWhere('result_id',6)->whereBetween('date_incident', [$date_from, $date_to])->orWhereBetween('date_action', [$date_from, $date_to])->orderBy(DB::raw('ABS(no_laporan)'), 'desc')->get();
                 }else{
                // $incidentReports = IncidentReport::where('result_id',2)->orWhere('result_id',5)->orWhere('result_id',6)->orderBy(DB::raw('ABS(created_at)'), 'desc')->get();
                $incidentReports = IncidentReport::where('result_id',2)->orWhere('result_id',5)->orWhere('result_id',6)->orderBy('id','desc')->get();

                }
        }
            // $dataForAll = IncidentReport::where('result_id',2)->get();


        return view('admin.incidentReports.index', compact('incidentReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('incident_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classifies = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dept_designateds = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.incidentReports.create', compact('root_causes', 'categories', 'classifies', 'dept_designateds'));
    }

    public function store(StoreIncidentReportRequest $request)
    {
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

        return redirect()->route('admin.incident-reports.index');
    }

    public function edit(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('incident_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $root_causes = RootCause::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CategoryIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $classifies = ClassificationIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dept_designateds = DesignationDepartment::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $area_incidents = AreaIncident::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chemical_releases = ChemicalRelease::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'result', 'reviewed_by', 'acknowledged_by','area','chemical');

        return view('admin.incidentReports.edit', compact('root_causes', 'categories', 'classifies', 'dept_designateds', 'incidentReport','chemical_releases','area_incidents'));
    }

    public function update(UpdateIncidentReportRequest $request, IncidentReport $incidentReport)
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

        return redirect()->route('admin.incident-reports.index');
    }

    public function show(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('incident_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReport->load('nama_pelapor', 'dept_origin', 'root_cause', 'category', 'classify', 'dept_designated', 'action_by', 'result', 'reviewed_by', 'acknowledged_by');

        $investigation_details = InvestigationDetail::with('incidents','precortives')->where('incident_report_id',$incidentReport->id)->get();

        return view('admin.incidentReports.show', compact('incidentReport','investigation_details'));
    }

    public function destroy(IncidentReport $incidentReport)
    {
        abort_if(Gate::denies('incident_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('incident_report_create') && Gate::denies('incident_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new IncidentReport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function read(Request $request)
    {
        $incidentReports = \Auth::user()->userIncidentReports()->where('read', false)->get();

        foreach ($incidentReports as $incidentReport) {
            $pivot       = $incidentReport->pivot;
            $pivot->read = true;
            $pivot->read_at = Carbon::now();
            $pivot->save();
        }
    }
}

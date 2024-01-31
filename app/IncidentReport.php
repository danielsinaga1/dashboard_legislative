<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IncidentReport extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'incident_reports';

    protected $appends = [
        'file',
        'photos',
        'file_initiator',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_action',
        'date_incident',
        'acknowledged_at',
        'reviewed_at',
        'assigned_at',
    ];

    protected $fillable = [
        'status',
        'perbaikan',
        'direct_cost',
        'copq',
        'perbaikan_awal',
        'location',
        'pencegahan',
        'reason',
        'result_id',
        'no_laporan',
        'updated_at',
        'created_at',
        'deleted_at',
        'date_action',
        'classify_id',
        'category_id',
        'description',
        'date_incident',
        'acknowledged_at',
        'reviewed_at',
        'assigned_at',
        'root_cause_id',
        'reviewed_by_id',
        'dept_origin_id',
        'area_id',
        'cr_id',
        'ri_id',
        'nama_pelapor_id',
        'action_by_id',
        'dept_designated_id',
        'acknowledged_by_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(50)->height(50);
    }


    public function investigations()
    {
        return $this->hasMany(InvestigationDetail::class,'incident_report_id','id');
    }

    // public function investigations(){
    //     return $this->belongsToMany(InvestigationDetail::class);
    // }

    public function nama_pelapor()
    {
        return $this->belongsTo(User::class, 'nama_pelapor_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function dept_origin()
    {
        return $this->belongsTo(OriginDepartment::class, 'dept_origin_id');
    }

    public function root_cause()
    {
        return $this->belongsTo(RootCause::class, 'root_cause_id');
    }

    public function getPhotosAttribute()
    {
        $files = $this->getMedia('photos');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file');
    }

    public function getFileInitiatorAttribute(){
        return $this->getMedia('file_initiator');
    }

    public function category()
    {
        return $this->belongsTo(CategoryIncident::class, 'category_id');
    }

    public function classify()
    {
        return $this->belongsTo(ClassificationIncident::class, 'classify_id');
    }

    public function getDateIncidentAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateIncidentAttribute($value)
    {
        $this->attributes['date_incident'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDateActionAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateActionAttribute($value)
    {
        $this->attributes['date_action'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function dept_designated()
    {
        return $this->belongsTo(DesignationDepartment::class, 'dept_designated_id');
    }

    public function action_by()
    {
        return $this->belongsTo(User::class, 'action_by_id');
    }

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id');
    }

    public function reviewed_by()
    {
        return $this->belongsTo(User::class, 'reviewed_by_id');
    }

    public function acknowledged_by()
    {
        return $this->belongsTo(User::class, 'acknowledged_by_id');
    }

    public function chemical()
    {
        return $this->belongsTo(ChemicalRelease::class, 'cr_id');
    }

    public function area()
    {
        return $this->belongsTo(AreaIncident::class, 'area_id');
    }

    public function region()
    {
        return $this->belongsTo(RegionIncident::class, 'ri_id');
    }

    public static function getNextNumberReport(){
        $year = Carbon::now()->format('y');
        $month = Carbon::now()->format('m');

        $yearMonth = Carbon::now()->format('my');

        $lastReport = IncidentReport::orderBy('created_at','desc')->first();
        // $lastReport = DB::select('select * from incident_reports limit 1');
        if($lastReport == NULL){
            $number = 0;
        } else {
            $number = explode("-", $lastReport->no_laporan);
        }

        if($yearMonth != $number[1]) {
        $number = 0;
        }else {
            $number = $number[2];
        }

        return sprintf('%04d', intval($number) + 1);

    }

    public function hasUnreads(){
        return $this->notifications()->whereNull('read_at')->where('sender_id', '!=', Auth::user()->id)->exists();
    }



    public function receiverOrCreator(){

        $incidentReportNotifications = IncidentReport::all();

        foreach($incidentReportNotifications as $incidentReportNotification){
            return $this->nama_pelapor_id === auth()->user()->id
        ? User::withTrashed()->find($incidentReportNotification->receiver_id)
        : Auth::user();
        }

    }

    public function notifications()
    {
        return $this->hasMany(IncidentReportNotification::class, 'incident_id','id')->orderBy('created_at','desc');
    }

    // public static function unreadCount($receiver_id){
    //     $incidentReports = IncidentReport::where(function ($query) {
    //         $query
    //             ->where('nama_pelapor_id', Auth::user()->id)
    //             ->orWhere($receiver_id, Auth::user()->id);
    //     })
    //         ->with('notifications')
    //         ->orderBy('created_at', 'DESC')
    //         ->get();

    //     $unreadCount = 0;

    //     foreach ($incidentReports as $incidentReport) {
    //         foreach ($incidentReport->notifications as $notification) {
    //             if ($notification->sender_id !== Auth::user()->id && $notification->read_at === null) {
    //                 $unreadCount++;
    //             }
    //         }
    //     }
    //     return $unreadCount;
    // }

    public static function unreadCount()
    {
        $incidentReports = IncidentReport::where(function ($query) {
            $query
                ->where('nama_pelapor_id', auth()->user()->id);
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreadCount = 0;

        foreach ($incidentReports as $incidentReport) {
            foreach ($incidentReport->notifications as $notification) {
                if ($notification->sender_id !== auth()->user()->id && $notification->read_at === null) {
                    $unreadCount++;
                }
            }
        }

        return $unreadCount;
    }

    public static function countMyIncident(){
        $authNpk = auth()->user()->npk;
        $authDeptId = auth()->user()->dept_id;
        $authId = auth()->user()->id;

        $counter = 0;

        if(auth()->user()->is_initiator || auth()->user()->is_administrator){
            $incidentReports = IncidentReport::where('nama_pelapor_id', $authId)->with('nama_pelapor')->get();
            foreach($incidentReports as $incidentReport){
                if($incidentReport->status == 'Open'){
                    $counter++;
                }
            }
        }elseif(auth()->user()->is_superintendent){
            if($authNpk == 1102251){
                $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                    $query->where('parent_id',auth()->user()->id);
                })->orWhere('nama_pelapor_id',$authId)->orWhere('ri_id', 2)->get();

                foreach($incidentReports as $incidentReport){
                    if($incidentReport->status == 'Open'){
                        $counter++;
                    }
                }

            }elseif($authNpk == '0802214') {
                $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                    $query->where('parent_id',auth()->user()->id);
                })->orWhere('nama_pelapor_id',$authId)->get();

                foreach($incidentReports as $incidentReport){
                    if($incidentReport->status == 'Open'){
                        $counter++;
                    }
                }
            }else {
                $incidentReports =IncidentReport::whereHas('nama_pelapor',function($query){
                    $query->where('parent_id',auth()->user()->id);
                })->orWhere('nama_pelapor_id',$authId)->get();

                foreach($incidentReports as $incidentReport){
                    if($incidentReport->status == 'Open'){
                        $counter++;
                    }
                }
            }
        }elseif (auth()->user()->is_manager) {
            if(auth()->user()->npk == '0902229'){
                $incidentReports =IncidentReport::with(['dept_origin'])->where('dept_origin_id',$authDeptId)->get();
            }else{
                $incidentReports =IncidentReport::with(['dept_origin'])->where('dept_origin_id',$authDeptId)->where('result_id','!=', 4)->orWhere('nama_pelapor_id',$authId)->get();
            }


            foreach($incidentReports as $incidentReport){
                if($incidentReport->status == 'Open'){
                    $counter++;
                }

        }
    }
    return $counter;
}

 public static function countTaskIncident(){
    $authNpk = auth()->user()->npk;
    $authDeptId = auth()->user()->dept_id;
    $authId = auth()->user()->id;

    $counter = 0;

    if (auth()->user()->is_initiator || auth()->user()->is_superintendent || auth()->user()->is_administrator) {
        $incidentReports = IncidentReport::where('action_by_id',$authId)->where('status','Open')->get();

        $counter = count($incidentReports);

    }elseif(auth()->user()->is_manager){
        $incidentReports = IncidentReport::where('dept_designated_id', $authDeptId)->where('status','Open')->whereNotNull('acknowledged_by_id')->with('dept_designated')->get();

        $counter = count($incidentReports);
    }

    return $counter;
}

}

<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTimeInterface;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class NonConformity extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'nonconformity_reports';

    protected $appends = [
        'file',
        'photos',
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_action',
        'date_event',
        'assigned_at',
        'acknowledged_at',
        'done_at',
    ];

    protected $fillable = [
        'status',
        'corrective',
        'preventive',
        'location',
        'reason',
        'reason2',
        'is_jso',
        'no_laporan',
        'updated_at',
        'created_at',
        'deleted_at',
        'acknowledged_at',
        'date_action',
        'date_event',
        'assigned_at',
        'description',
        'result_id',
        'root_cause_id',
        'dept_origin_id',
        'area_id',
        'nama_pelapor_id',
        'location_ncr_id',
        'non_plant_location_id',
        'dept_designated_id',
        'region_id',
        'entity_id',
        'assigned_to_id',
    ];

    public function registerAllMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(50)->height(50);
    }

    public function nama_pelapor()
    {
        return $this->belongsTo(User::class, 'nama_pelapor_id');
    }

    public function dept_origin()
    {
        return $this->belongsTo(OriginDepartment::class, 'dept_origin_id');
    }


    public function non_plant_location()
    {
        return $this->belongsTo(NonPlantLocation::class, 'non_plant_location_id');
    }


    public function root_cause()
    {
        return $this->belongsTo(RootCause::class, 'root_cause_id');
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }


    public function region()
    {
        return $this->belongsTo(RegionNcr::class, 'region_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_ncr_id');
    }

    public function dept_designated()
    {
        return $this->belongsTo(DesignationDepartment::class, 'dept_designated_id');
    }

    public function action_by()
    {
        return $this->belongsTo(User::class, 'action_by_id');
    }

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }


    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id');
    }

    public function acknowledged_by()
    {
        return $this->belongsTo(User::class, 'acknowledged_by_id');
    }

    public function area()
    {
        return $this->belongsTo(AreaIncident::class, 'area_id');
    }

    public function comment()
    {
        return $this->hasMany(CommentNonconformity::class, 'nr_id', 'id');
    }

    // public function getDateEventAttribute($value)
    // {
    //     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value, null)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    // }

    public function setDateEventAttribute($value)
    {
        $this->attributes['date_event'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value, null)->format('Y-m-d H:i:s') : null;
    }


    public function getDateEventAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format(config('panel.date_format') . ' ' . config('panel.time_format'));
    }

    public function getDateActionAttribute($value)
    {
        // return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }



    public function setDateActionAttribute($value)
    {
        $this->attributes['date_action'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
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


    public static function getNextNumberReport()
    {
        $year = Carbon::now()->format('y');
        $month = Carbon::now()->format('m');

        $monthYear = Carbon::now()->format('my');

        // $lastReport = NonConformity::orderBy('created_at', 'desc')->first();
        $lastReport = NonConformity::latest()->first();
        // $lastReport = DB::select('select * from incident_reports limit 1');


        //get last record
        // $expNum = explode('-', $lastReport->no_laporan);



        // //check first day in a year
        // if (date('l', strtotime(date('Y-01-01')))) {
        //     $nextInvoiceNumber = date('Y') . '-0001';
        // } else {
        //     //increase 1 with last invoice number
        //     $nextInvoiceNumber = $expNum[0] . '-' . $expNum[1] + 1;
        // }

        // if ($lastReport == NULL) {
        //     $number = 0;
        // } else {
        //     $number = explode("-", $lastReport->no_laporan);
        // }

        // if ($monthYear != $number[1]) {
        //     $number = 0;
        // } else {
        //     $number = $number[2];
        // }

        if ($lastReport == null or $lastReport == "") {
            $noReport = 0;
        } else {
            $expNum = explode('-', $lastReport->no_laporan);
            $noReport = $expNum[2];
        }


        return sprintf('%04d', intval($noReport) + 1);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestigationDetail extends Model
{
    use SoftDeletes;

    public $table = 'investigation_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_deadline',
        'date_actual',
    ];

    protected $fillable = [
        'recommendation',
        'date_deadline',
        'date_actual',
        'status',
        'pic_id',
        'precortive_id',
        'incident_report_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function picInvestigation(){

        return $this->belongsTo(User::class, 'pic_id');
    }

    public function precortives()
    {
        return $this->belongsTo(Precortive::class, 'precortive_id');
    }

    public function incidents()
    {
        return $this->belongsTo(IncidentReport::class, 'incident_report_id');
    }

    public function getDateDeadlineAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
        // return Carbon::parse($value)->format('Y-m-d\TH:i');
    }


    public function setDateDeadlineAttribute($value)
    {
        // $this->attributes['date_deadline'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format_local'), $value)->format('Y-m-d H:i') : null;

        $this->attributes['date_deadline'] = Carbon::createFromFormat('Y-m-d\TH:i', $value)->format('Y-m-d H:i');
    }

    public function getDateActualAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateActualAttribute($value)
    {
        $this->attributes['date_actual'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }


    public static function countInvestigatonDetail(){

        $authId = auth()->user()->id;

        $countInvestigation = DB::table('investigation_details')->where('pic_id',$authId)->count();
        
        return $countInvestigation;
    }
}

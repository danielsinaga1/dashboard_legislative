<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributionIncident extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'distribution_incidents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'result_id',
        'updated_at',
        'created_at',
        'deleted_at',
        'description',
        'ir_id',
        'name_id',
    ];

    public function name_report(){

        return $this->belongsTo(User::class, 'name_id');
    }

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id');
    }

    public function no_incident()
    {
        return $this->belongsTo(IncidentReport::class, 'ir_id');
    }


}

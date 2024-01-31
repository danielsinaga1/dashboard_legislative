<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaIncident extends Model
{
    use SoftDeletes;
    public $table = 'area_incidents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function areaIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'area_id', 'id');
    }
}

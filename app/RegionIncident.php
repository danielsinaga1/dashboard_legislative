<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionIncident extends Model
{
    use SoftDeletes;

    public $table = 'region_incidents';

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

    public function regionIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'ri_id', 'id');
    }
}

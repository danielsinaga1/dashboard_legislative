<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RootCause extends Model
{
    use SoftDeletes;

    public $table = 'root_causes';

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

    public function rootCauseIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'root_cause_id', 'id');
    }
}

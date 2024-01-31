<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Precortive extends Model
{
    use SoftDeletes;
    public $table = 'precortives';

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

    // public function chemicalRealeaseIncidentReports()
    // {
    //     return $this->hasMany(IncidentReport::class, 'cr_id', 'id');
    // }

    public function investigations()
    {
        return $this->hasMany(InvestigationDetail::class,'precortive_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChemicalRelease extends Model
{
    use SoftDeletes;
    public $table = 'chemical_releases';

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

    public function chemicalRealeaseIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'cr_id', 'id');
    }

}

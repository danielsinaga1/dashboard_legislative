<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NonPlantLocation extends Model
{
    use SoftDeletes;

    public $table = 'nonplant_locations';

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


    public function nonPlantlocationNonConformityReports()
    {
        return $this->hasMany(NonConformity::class, 'non_plant_location_id', 'id');
    }
}

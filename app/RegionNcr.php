<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionNcr extends Model
{
    use SoftDeletes;

    public $table = 'region_ncrs';

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


    public function regionNonConformityReports()
    {
        return $this->hasMany(NonConformity::class, 'region_id', 'id');
    }


    public function regionLocations()
    {
        return $this->hasMany(RegionNcr::class, 'region_ncr_id', 'id');
    }
}

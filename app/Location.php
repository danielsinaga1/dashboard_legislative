<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{

    use SoftDeletes;

    public $table = 'locations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'region_ncr_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function locationNonConformityReports()
    {
        return $this->hasMany(NonConformity::class, 'location_ncr_id', 'id');
    }


    public function region()
    {
        return $this->belongsTo(RegionNcr::class, 'region_ncr_id');
    }
}

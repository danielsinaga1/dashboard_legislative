<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryIncident extends Model
{
    use SoftDeletes;

    public $table = 'category_incidents';

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

    public function categoryClassificationDetails()
    {
        return $this->hasMany(ClassificationDetail::class, 'category_id', 'id');
    }

    public function categoryIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'category_id', 'id');
    }
}

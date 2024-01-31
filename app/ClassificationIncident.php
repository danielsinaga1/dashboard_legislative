<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassificationIncident extends Model
{
    use SoftDeletes;

    public $table = 'classification_incidents';

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

    public function classifyIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'classify_id', 'id');
    }

    public function classificationClassificationDetails()
    {
        return $this->hasMany(ClassificationDetail::class, 'classification_id', 'id');
    }
}

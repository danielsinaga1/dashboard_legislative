<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignationDepartment extends Model
{
    use SoftDeletes;

    public $table = 'designation_departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function deptDesignatedIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'dept_designated_id', 'id');
    }
}

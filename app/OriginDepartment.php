<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OriginDepartment extends Model
{
    use SoftDeletes;

    public $table = 'origin_departments';

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

    public function deptOriginIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'dept_origin_id', 'id');
    }

    public function deptUsers()
    {
        return $this->hasMany(User::class, 'dept_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeProject extends Model
{
    use SoftDeletes;

    public $table = 'time_projects';

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

    public function projectTimeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'project_id', 'id');
    }
}

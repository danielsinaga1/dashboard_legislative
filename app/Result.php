<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    public $table = 'results';

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

    public function resultIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'result_id', 'id');
    }

    public function resultNonConformityReports()
    {
        return $this->hasMany(NonConformity::class, 'result_id', 'id');
    }


    public function resultCommentNonConformityReports()
    {
        return $this->hasMany(CommentNonconformity::class, 'result_id', 'id');
    }
}

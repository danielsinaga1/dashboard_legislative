<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{

    use SoftDeletes;

    public $table = 'entitys';

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


    public function entityNonConformityReports()
    {
        return $this->hasMany(NonConformity::class, 'entity_id', 'id');
    }
}

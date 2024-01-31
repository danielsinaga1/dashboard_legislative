<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserParent extends Model
{
    public $table = 'user_parents';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
    ];


    public function parentUserParents()
    {
        return $this->hasMany(User::class, 'parent_id','id');
    }
}

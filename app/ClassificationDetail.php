<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ClassificationDetail extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'classification_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'category_id',
        'classification_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(50)->height(50);
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //           ->width(368)
    //           ->height(232)
    //           ->sharpen(10);
    // }

    public function category()
    {
        return $this->belongsTo(CategoryIncident::class, 'category_id');
    }

    public function classification()
    {
        return $this->belongsTo(ClassificationIncident::class, 'classification_id');
    }
}

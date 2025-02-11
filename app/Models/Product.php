<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'normal_price',
        'spacial_price',
        'short_detail',
        'detail',
        'publish',
        'sort',
        'meta_tag',
        'meta_description',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product');
    }

    public function product_category(){
        return $this->belongsToMany(ProductCategory::class, 'product_has_categories','product_id','product_categories_id');
    }
}

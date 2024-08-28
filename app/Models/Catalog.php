<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Catalog extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'title_uz',
        'title_ru',
        'title_en',
        'description_uz',
        'description_ru',
        'description_en',
        'image',
        'second_image',
        'slug',
        'is_active',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_en')
            ->saveSlugsTo('slug');
    }
}

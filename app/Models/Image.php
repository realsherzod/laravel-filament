<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'is_active', 'catalog_id'];

    
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

}

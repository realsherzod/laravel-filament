<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['video', 'is_active', 'catalog_id'];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

}

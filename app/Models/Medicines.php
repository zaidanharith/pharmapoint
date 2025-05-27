<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicines extends Model
{
    /** @use HasFactory<\Database\Factories\MedicinesFactory> */
    use HasFactory;

    protected $fillable = ['name','slug','price','stock', 'category_id'];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    // public function setSlugAttribute($value)
    // {
    //     $this->attributes['slug'] = Str::slug($this->name);
    // }
}

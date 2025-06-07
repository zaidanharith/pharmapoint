<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicines extends Model
{
    /** @use HasFactory<\Database\Factories\MedicinesFactory> */
    use HasFactory, Sluggable;

    protected $fillable = ['name','slug','price','stock', 'category_id'];
    protected $with = ['category'];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function description() : HasMany {
        return $this->hasMany(MedicineDescription::class);
    }
    
    public function transaction_detail() : HasMany {
        return $this->hasMany(TransactionDetail::class);
    }

    public function scopeFilter(Builder $query) : void {
        $query->where('name','LIKE','%'.request('search').'%');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
                'separator' => '-',
                'unique' => true,
                'method' => function ($string) {
                    return Str::slug($string, '-', 'id');
                },
            ],
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = ['grand_total','payment_method','user_id'];

    public function detail() : HasMany {
        return $this->hasMany(TransactionDetail::class);
    }
    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}

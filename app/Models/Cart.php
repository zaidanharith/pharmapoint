<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medicine_id',
        'medicine_quantity',
        'subtotal',
    ];

    protected $guarded = ['id'];
    
    public function medicine()
    {
        return $this->belongsTo(Medicines::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}

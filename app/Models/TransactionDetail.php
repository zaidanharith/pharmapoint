<?php

namespace App\Models;

use App\Models\Medicines;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionDetailFactory> */
    use HasFactory;

    protected $fillable = ['transaction_id','medicine_id', 'medicine_quantity','subtotal',];

    public function transaction() : BelongsTo {
        return $this->belongsTo(Transaction::class);
    }

    public function cart() : BelongsTo {
        return $this->belongsTo(Cart::class);
    }
}

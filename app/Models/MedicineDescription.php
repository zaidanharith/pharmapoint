<?php

namespace App\Models;

use App\Models\Medicines;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicineDescription extends Model
{
    /** @use HasFactory<\Database\Factories\MedicineDescriptionFactory> */
    use HasFactory;

    protected $fillable = ['medicine_id','description'];

    public function description() : BelongsTo {
        return $this->belongsTo(Medicines::class);
    }
}

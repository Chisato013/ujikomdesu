<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoCode extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ["id"];
    public function transaksi():BelongsTo
    {
        return $this->belongsTo(ProductTransaction::class, 'promo_code_id');
    }
}

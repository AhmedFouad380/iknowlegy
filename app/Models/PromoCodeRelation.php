<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCodeRelation extends Model
{
    use HasFactory;

    public function Promo(){
        return $this->belongsTo(PromoCode::class ,'promo_id');
    }
}

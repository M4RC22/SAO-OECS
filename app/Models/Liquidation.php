<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidation extends Model
{
    use HasFactory;

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
    public function proofOfPayment(){
        return $this->hasMany(ProofOfPayment::class);
    }
    public function liquidationItem()
    {
        return $this->hasMany(LiquidationItem::class);
    }
}

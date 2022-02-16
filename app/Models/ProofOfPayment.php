<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofOfPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ]; 
    public function liquidation()
    {
        return $this->belongsTo(Liquidation::class);
    }
}

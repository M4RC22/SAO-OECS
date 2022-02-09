<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function requisitionItem()
    {
        return $this->hasMany(RequisitionItem::class);
    }

   
    
}

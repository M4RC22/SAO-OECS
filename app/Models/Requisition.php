<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'remarks',
        'chargedDepartment',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($requisition){

            $request = request();  

            for($i = 0; $i < count($request->qty); $i++){

                $requisition->requisitionItem()->create([
                    'quantity' => $request->qty[$i],
                    'purpose' => $request->purpose[$i],
                    'unitCost' => $request->cost[$i],

                ]);
            }
        });
    }   

    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function requisitionItem()
    {
        return $this->hasMany(RequisitionItem::class);
    }

   
    
}

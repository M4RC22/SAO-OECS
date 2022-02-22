<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Liquidation extends Model
{
    use HasFactory;

    protected $fillable =  [
        'eventDate',
        'cashAdvance',
        'cvNumber',
        'deduct',
    ];

    protected $dates = [
        'eventDate',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($liquidation){

            $request = request();  

            for($i = 0; $i < count($request->amount); $i++){

                $liquidation->liquidationItem()->create([
                    'dateBought' => $request->dateBought[$i],
                    'particulars' => $request->particulars[$i],
                    'amountPerDay' => $request->amount[$i],

                ]);
            }

            foreach($request->receipt as $receipt){

                $imagePath = $receipt->store('uploads/photos', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->resize(500,300);
                $image->save();


                $liquidation->proofOfPayment()->create([
                    'image' => $imagePath,
                ]);
            }

        });
    }


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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;


    public function formProposals()
    {
        return $this->hasOne(Proposals::class);
    }
}

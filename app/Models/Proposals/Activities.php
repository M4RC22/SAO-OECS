<?php

namespace App\Models\Proposals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    public function activitiesProposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}

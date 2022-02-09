<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormValidation extends Controller
{
    
    public function activityProposalAdd(Request $request)
    {
        
        $validate = $request->validate([
            'eventTitle' => 'required',
            'description' => 'required'
        ]);

        
    }
}

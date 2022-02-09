<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Form;

class FormValidationController extends Controller
{
    public function activityProposalAdd(Request $request)
    {
        $form = new Form;

        $validate = $request->validate([
            'eventTitle' => 'required',
            'description' => 'required'
        ]);


    

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'APF:B',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => '123123123',
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,

        ]);
        
        return redirect('/home');


    }


}

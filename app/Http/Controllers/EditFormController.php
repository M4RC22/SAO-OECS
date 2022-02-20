<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use App\Models\RequisitionItem;


class EditFormController extends Controller
{
    public function requisitionEdit($form){

        $form = Form::findOrFail($form);   
        
        $requisition = $form->requisition;
        $requisitionItem = $requisition->requisitionItem;

        return view('editForms/requisitionEdit', compact('form', 'requisition', 'requisitionItem'));
    }

    public function requisitionUpdate($form, Request $request){

        $form = Form::findOrFail($form);

        RequisitionItem::where('requisition_id', $form->requisition->id)->get()->each->delete();

        $form->update(
            [
                'status'=> "Pending",
                'remarks'=> null,
            ]
        );

        $form->requisition()->update(
            [
                'type' => $request->paymentMethod,
                'remarks' => $request->remarks,
                'chargedDepartment' => $request->chargeTo,
        ]);

        for($i = 0; $i < count($request->qty); $i++){
            $form->requisition->requisitionItem()->create(
                [
                    'quantity' => $request->qty[$i],
                    'purpose' => $request->purpose[$i],
                    'unitCost' => $request->cost[$i],
            ]);
        }

        return redirect('home');
    }

    public function narrativeEdit($form)
    {

        $form = Form::findOrFail($form);   

        $narrative = $form->narrative;
        $programs = $narrative->program;
        $participants = $narrative->participant;
        $posters = $narrative->narrativeImage->where('type', 'poster');
        $eventImages = $narrative->narrativeImage->where('type', 'photo');
        $comments = $narrative->commentSuggestion->where('type', 'comment');
        $suggestions = $narrative->commentSuggestion->where('type', 'suggestion');

    
        return view ('editForms/narrativeEdit', compact('form', 'narrative', 'programs', 'participants', 'posters', 'eventImages', 'comments', 'suggestions'));
    }
}

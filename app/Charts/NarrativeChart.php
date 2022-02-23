<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NarrativeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $narrativeApprove = DB::table('forms')->where('status', 'Approved')->where('formType', 'Narrative')->count();

        $narrativePending = DB::table('forms')->where('status', 'Pending')->where('formType', 'Narrative')->count();

        return Chartisan::build()
            ->labels(['Approved', 'Pending'])
            ->dataset('pie', [$narrativeApprove, $narrativePending ]);
    }
}
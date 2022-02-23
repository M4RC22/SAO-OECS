<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class OrgCreationController extends Controller
{

    public function apply(Request $request, $userId){

    
        if(DB::table('organizations')->where('orgName', $request->orgName)->exists()){

            return back()->with('errorInSubmission', 'Organization Name already exist!');
        }
        
        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('y-m-d H:i');

        $validate = $request->validate([
            'orgName' => 'required',
            'presidentEmail' => 'required|email',
        ]);

        $data = [['faculty_id' => $userId, 'proposedOrgName' =>$request->orgName , 'presidentEmail' => $request->presidentEmail, 'created_at' => $dateTime]];

        DB::table('org_applications')->insert($data);

        return redirect('home');
        
    }

    public function applicants(){

        $applications = DB::table('org_applications')->get();

        $advisers = [];
        
        foreach($applications as $userId){
            $adviser = DB::table('users')->where('id', $userId->faculty_id)->get();

            array_push($advisers, $adviser);
        }

        return view('/tabs/applicants', compact('applications', 'advisers'));
    }

    public function viewDetails($id){

        $application = DB::table('org_applications')->where('id', $id)->get();
    
        $adviser = DB::table('users')->where('id', $application[0]->faculty_id)->get();

   
        return view('/tabs/viewDetails', compact('application', 'adviser'));
    }

    public function approve($applicationId, Request $request){

        $user = auth()->user();

        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('y-m-d H:i');

        $application = DB::table('org_applications')->where('id', $applicationId)->get();

        $presidentId = DB::table('users')->where('email', $application[0]->presidentEmail)->get();

      
        if(Hash::check($request->confirmPass, $user->password)) {

            $orgData = [['orgName' => $application[0]->proposedOrgName, 'created_at' => $dateTime]];
            DB::table('organizations')->insert($orgData);

            $org = DB::table('organizations')->where('orgName', $application[0]->proposedOrgName)->get();

            $insertAdviser = [['user_id' => $application[0]->faculty_id, 'organization_id' => $org[0]->id, 'position' => 'Adviser', 'created_at' => $dateTime]];

            $insertPresident = [['user_id' => $presidentId[0]->id, 'organization_id' => $org[0]->id, 'position' => 'President', 'created_at' => $dateTime]];

            DB::table('organization_user')->insert($insertAdviser);

            DB::table('organization_user')->insert($insertPresident);

            DB::table('org_applications')->where('id', $application[0]->id)->delete();

            return redirect('home');

        }
        else{
            return back()->with('errorInApproval', 'Ooops! Your Password seems Incorrect.');
        }

    }

    public function deny($id){
        dd($id);
    }

    
}

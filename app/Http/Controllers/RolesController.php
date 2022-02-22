<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $user = auth()->user();

        $userPos = $user->studentOrg()->value("organization_user.position");

        //Get the list of id that belongs to organization of authenticated user
        $currUserOrg = $user->studentOrg()->value("organizations.id");

        $orgMemId = DB::select('select * from organization_user where organization_id = ?', [$currUserOrg]);

        //Return users that are part of authenticated user's organization
        $orgMembers = [];
        
        foreach($orgMemId as $userId){
            $orgMember = DB::select('select id, firstName, lastName from users where id = ?', [$userId->user_id]);

            array_push($orgMembers, $orgMember);
        }
        
        $count = 0;
        foreach($orgMemId as $userId){
            $orgMember = DB::select('select position from organization_user where user_id = ?', [$userId->user_id]);
            array_push($orgMembers[$count], $orgMember[0]);
            $count++;
        }

            return view('/tabs/roles', compact('user', 'userPos', 'orgMembers'));
    }

    public function assignPosition(Request $request)
    {
        $user = auth()->user();

        $validate = $request->validate([
            'position' => 'required',
            'email' => 'required|email',
        ]);


        if(User::where('email', $request->email)->exists()){

            $orgQuery = $user->studentOrg()->get();
            $orgId = $orgQuery[0]->id;
            $userCred = DB::table('users')->where('email', $request->email)->get();

            if(DB::table('organization_user')->where('user_id', $userCred[0]->id)->exists()){

                return back()->with('errorUserAlreadyExist', 'Uh-oh! User is already part of this organization.');

            }
            else{
                if($request->role === "Member"){
                    //For Members
                    $data = [['user_id' => $userCred[0]->id , 'organization_id' => $orgId, 'position' => 'Member']];
                    
                    DB::table('organization_user')->insert($data);
    
                    return redirect('roles');
                }
                else if(DB::table('organization_user')->where('position', $request->role)->exists()){

                    return back()->with('errorRoleTaken', 'Uh-oh! '.$request->role .' Role is already taken.');
                    
                }
                else{
                    //For Member With Position
                    $data = [['user_id' => $userCred[0]->id , 'organization_id' => $orgId, 'position' => $request->position]];

                    DB::table('organization_user')->insert($data);

                    return redirect('roles');
                }
            } 
        }

        return back()->with('errorUserNotExist', 'Uh-oh! User does not exist.');

    }

    public function removeMember($memberId)
    {
        $user = auth()->user()->id;

        $userPos = DB::table('organization_user')->where('user_id', $user)->get();

        $removeUserPos = DB::table('organization_user')->where('user_id', $memberId)->get();

        if($userPos[0]->position === $removeUserPos[0]->position) {
            
            return back()->with('errorRemoveUser', 'Uh-oh! You cannot do that.');

        }else if($userPos[0]->position === 'President' && $removeUserPos[0]->position === 'Adviser'){
           
            return back()->with('errorRemoveUser', 'Uh-oh! You cannot do that.');

        }else{
            DB::table('organization_user')->where('user_id', $memberId)->delete();

            return redirect('roles');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {   
        $user = auth()->user();

        $userPos = $user->studentOrg()->value("organizations_user.position");

        //Get the list of id that belongs to organization of authenticated user
        $currUserOrg = $user->studentOrg()->value("organizations.id");

        $orgMemId = DB::select('select * from organizations_user where organizations_id = ?', [$currUserOrg]);

        //Return users that are part of authenticated user's organization
        $orgMembers = [];
        
        foreach($orgMemId as $userId){
            $orgMember = DB::select('select id, firstName, lastName from users where id = ?', [$userId->user_id]);

            array_push($orgMembers, $orgMember);
        }
        
        $count = 0;
        foreach($orgMemId as $userId){
            $orgMember = DB::select('select position from organizations_user where user_id = ?', [$userId->user_id]);
            array_push($orgMembers[$count], $orgMember[0]);
            $count++;
        }

            return view('/tabs/roles', compact('user', 'userPos', 'orgMembers'));
        }
}

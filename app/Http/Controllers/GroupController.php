<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupUsers;
use App\Models\GroupSongs;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\ArrayList;
use PhpParser\Node\Expr\List_;

class GroupController extends Controller
{
    //
    public function showGroups()
    {
        $groups = Group::all();
        if(empty($groups))
        {
            return back();
        }
        return view('groups.groups' , ['groups' => $groups ]) ;
    }
    public function view()
    {
        $groups = GroupUsers::where('user_id' , Auth::user()->id)->get();
        if(empty($groups))
        {
            return back();
        }
        return view('user.groups' , ['groups' => $groups ]) ;
    }
    public function viewSongs()
    {
        
    }
    public function viewForm()
    {
        return view('group.create' ) ;
    }
    public function store(Request $request)
    {
        $group = new Group ;
        $group->name = $request->name ;
        $group->save() ;
        $groupUsers = new GroupUsers ;
        $groupUsers->group_id = $group->id ;
        $groupUsers->user_id = $request->user()->id ;
        $groupUsers->save() ;
        return back()->with('success' , 'Added Successfully!') ;
    }
}

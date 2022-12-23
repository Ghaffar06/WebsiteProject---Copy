<?php

namespace App\Http\Controllers;

use App\Models\Listened;
use Illuminate\Http\Request;

class ListenedController extends Controller
{
    //
    public function view($number )
    {
        # code...
        $listened = Listened::all()->skip(($number-1) * 20)->take(20);
        if(empty($listened))
        {
            return redirect()->back()->with('error','There is no Data');
        }
        return view('user.listened' , ['listened' => $listened , 'number' => $number]) ;
    }
}

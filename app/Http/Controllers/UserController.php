<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserController extends Controller 
{
    public function import(Request $request) 
    {
        Excel::import(new UsersImport, $request->file);
        return redirect('/')->with('success', 'All good!');
    }
}

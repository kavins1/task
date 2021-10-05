<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use App\Exports\Userexport;
use Maatwebsite\Excel\Facdes\Excel;
class HomeController extends Controller
{
    public function view()
    {
        return view('importexportview');
    }

    // public function import()
    // {
    //      Excel ::Import(new UsersImport, request()->file('file'));
    //     return redirect()->back();
    // }
 
    public function export()
    {
        return Excel::download(new UserExport,'user.xlsx');
    }
}

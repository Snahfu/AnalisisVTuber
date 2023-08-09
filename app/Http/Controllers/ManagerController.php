<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.index');
    }
    
    public function tohistory()
    {
        return view('manager.history');
    }
    
    public function tocrawling()
    {
        return view('manager.crawling');
    }

    public function toanalysis()
    {
        return view('manager.analysis');
    }

}

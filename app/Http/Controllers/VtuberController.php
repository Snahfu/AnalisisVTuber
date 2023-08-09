<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VtuberController extends Controller
{
    public function index()
    {
        return view('vtuber.index');
    }
    
    public function tohistory()
    {
        return view('vtuber.history');
    }
    
    public function tocrawling()
    {
        return view('vtuber.crawling');
    }

    public function toanalysis()
    {
        return view('vtuber.analysis');
    }
}

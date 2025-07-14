<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
        $histories = History::with('task')->latest()->take(20)->get();
        $xp_total = session('xp_total', 0);

        return view('progress.index', compact('histories', 'xp_total'));
    }
}


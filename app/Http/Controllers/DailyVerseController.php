<?php

namespace App\Http\Controllers;

use App\Models\DailyVerse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DailyVerseController extends Controller
{

    public function index()
    {
        return Inertia::render('DailyVerse/Index', [
            'dverseSource' => DailyVerse::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'verse' => 'required|string',
            'words' => 'required|string',
        ]);

        $dverse = new DailyVerse();

        $dverse->verse = $request->verse;
        $dverse->words = $request->words;


        $dverse->save();


    }
}

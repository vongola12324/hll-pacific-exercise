<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function next()
    {
        $battle = Battle::latest();
        return view('next')->with(['battle' => $battle]);
    }

    public function history()
    {
        $battles = Battle::paginate(10);
        return view('history')->with(['battles' => $battles]);
    }
}

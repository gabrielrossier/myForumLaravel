<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class HomeController extends Controller
{
    //
    public function index()
    {
        //
        $themes = Theme::all();
        return view ('homepage')->with(compact('themes'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Shows the About page
     * 
     * @return View
     */
    function show()
    {
        return view('about.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Icon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['icons' => Icon::getFAIcons()]);
    }
}

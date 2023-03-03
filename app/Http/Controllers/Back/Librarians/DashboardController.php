<?php

namespace App\Http\Controllers\Back\Librarians;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.pages.librarians.dashboard')->with('title','Dashboard');
    }

}

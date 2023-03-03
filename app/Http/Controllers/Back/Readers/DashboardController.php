<?php

namespace App\Http\Controllers\Back\Readers;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index(){
        return view('backend.pages.readers.dashboard');
    }

}

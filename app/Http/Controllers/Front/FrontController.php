<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class FrontController extends Controller
{
   public function home_login(){
       return view('frontend.pages.login');
   }

}

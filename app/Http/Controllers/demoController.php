<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function Index(){

          return view('about');

    }
    public function Index2(){
         return view('contact');
    }
}

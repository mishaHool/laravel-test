<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function test(){
        return view('test');
    }
    function ret(){
        return view('ret');
    }
}

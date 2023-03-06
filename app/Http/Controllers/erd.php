<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class erd extends Controller
{
    public function index(){
        return view('erd.index');
    }
}

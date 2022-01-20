<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BkppController extends Controller
{
    public function input()
    {
      return view('bkpp.input');
    }
}

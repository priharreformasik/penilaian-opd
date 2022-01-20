<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BkadController extends Controller
{
    public function input()
    {
      return view('bkad.input');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilanController extends Controller
{
    public function index()
    {
        return view('bilan');
    }
}

?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DojoController extends Controller
{
    public function index()
    {
        return view('dojos');
    }
}

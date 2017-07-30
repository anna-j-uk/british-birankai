<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dojo;

class DojoController extends Controller
{
    public function index()
    {
        $dojos = Dojo::all();
        return view('dojos.list', compact('dojos'));
    }

    public function show(Dojo $dojo)
    {
        return view('dojos.details', compact('dojo'));
    }
}

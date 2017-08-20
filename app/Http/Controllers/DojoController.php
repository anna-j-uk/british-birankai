<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dojo;
use App\User;

class DojoController extends Controller
{
    public function index()
    {
        $dojos = Dojo::orderBy('name', 'asc')->get();
        foreach ($dojos as $dojo) {
            $dojo->teacher;
        }
        return view('dojos.list', compact('dojos'));
    }

    public function show(Dojo $dojo)
    {
        $dojo->teacher;
        return view('dojos.details', compact('dojo'));
    }

    public function edit($id)
    {
        $users = User::all();

        if ($id === 'new') {
            $dojo = new Dojo();
        } else {
            $dojo = Dojo::find($id);
        }

        return view('dojos.edit', compact('dojo', 'users'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $dojo = Dojo::find($data['id']);
        unset($data['id']);
        $dojo->fill($data);
        $dojo->save();
        return $dojo;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $dojo = new Dojo;
        unset($data['id']);
        $dojo->fill($data);
        $dojo->save();
        return $dojo;
    }
}

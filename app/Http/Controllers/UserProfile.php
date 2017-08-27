<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;

class UserProfile extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $admins = User::where('isAdmin', true)->get();
        $normies = User::where('isAdmin', false)->get();
        return view('my-profile', compact('user', 'admins', 'normies'));
    }

    public function updateUser(Request $request, User $user)
    {
        if (Auth::user()->id === $user->id) {
            $user->fill($request->all());
            $user->save();
            return $user;
        }
        return response('Unauthorized.', 401);
    }

    public function addAdmin(User $user)
    {
        $currentUser = Auth::user();
        $currentUser->setIsAdmin($user, 1);
        $user->save();
        return $user;
    }

    public function removeAdmin(User $user)
    {
        $currentUser = Auth::user();
        $currentUser->setIsAdmin($user, 0);
        $user->save();
        return $user;
    }
}
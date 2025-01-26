<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Rant;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('profile.index');
    // }

    public function userProfile(User $user)
    {
        // dd($user->username);
        $user = User::where('username', $user->username)->firstOrFail();
        $rants = $user->rants()->latest()->get();
        return view('profile.show', [
            'user' => $user,
            'rants' => $rants
        ]);
    }

}
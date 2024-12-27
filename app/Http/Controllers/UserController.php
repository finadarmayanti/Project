<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        // Mengambil data user yang sedang login
        return view('user.profile');
    }
}



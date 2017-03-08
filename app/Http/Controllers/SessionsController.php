<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except' => 'destory']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Attempt to authenticate the user.
        // If not, redirect back.
        // If so, sign them in.
        if (! auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        //Redirct to the home page.
        return redirect()->home();
    }

    public function destory()
    {
        auth()->logout();

        return redirect()->home();
    }
}

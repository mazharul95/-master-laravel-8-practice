<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function home()
    {
        return view('home.index');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function register()
    {
        return view('auth.register');
    }

}

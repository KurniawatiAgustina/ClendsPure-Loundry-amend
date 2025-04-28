<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.landing.index');
    }

    public function about()
    {
        return view('pages.landing.about');
    }

    public function blog()
    {
        return view('pages.landing.blog');
    }

    public function service()
    {
        return view('pages.landing.service');
    }

    public function store()
    {
        return view('pages.landing.store');
    }
}

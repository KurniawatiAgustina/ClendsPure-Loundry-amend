<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\DisplayPromo;
use App\Models\DisplayService;
use App\Models\DisplayTimeline;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $displayPromos = DisplayPromo::orderBy('id', 'desc')->get();
        $displayServices = DisplayService::orderBy('id', 'desc')->get();
        return view('pages.landing.index', compact('displayPromos', 'displayServices'));
    }

    public function about()
    {
        $displayTimelines = DisplayTimeline::orderBy('id', 'desc')->get();
        return view('pages.landing.about', compact('displayTimelines'));
    }

    public function blog()
    {
        $articles = Article::all();
        return view('pages.landing.blog', compact('articles'));
    }

    public function service()
    {
        $displayServices = DisplayService::orderBy('id', 'desc')->get();
        return view('pages.landing.service', compact('displayServices'));
    }

    public function store()
    {
        return view('pages.landing.store');
    }
}

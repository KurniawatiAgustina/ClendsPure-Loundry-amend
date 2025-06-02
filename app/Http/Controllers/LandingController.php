<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\DisplayAboutGalery;
use App\Models\DisplayAboutSlide;
use App\Models\DisplayCondition;
use App\Models\DisplayProfit;
use App\Models\DisplayPromo;
use App\Models\DisplayReview;
use App\Models\DisplayService;
use App\Models\DisplaySlide;
use App\Models\DisplayStatistic;
use App\Models\DisplayTimeline;
use App\Models\DisplayTutorial;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $displayPromos = DisplayPromo::orderBy('id', 'desc')->get();
        $displayServices = DisplayService::orderBy('id', 'desc')->get();
        $displaySlides = DisplaySlide::first();
        $displayTutorials = DisplayTutorial::all();
        $displayStatistics = DisplayStatistic::all();

        return view('pages.landing.index', compact('displayPromos', 'displayServices', 'displayTutorials', 'displaySlides', 'displayStatistics'));
    }

    public function about()
    {
        $displayTimelines = DisplayTimeline::orderBy('id', 'desc')->get();
        $displayAboutSlides = DisplayAboutSlide::first();
        $displayAboutGaleries = DisplayAboutGalery::all();

        return view('pages.landing.about', compact('displayTimelines', 'displayAboutSlides', 'displayAboutGaleries'));
    }

    public function blog()
    {
        $articles = Article::all();
        return view('pages.landing.blog', compact('articles'));
    }

    public function detailBlog($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.landing.detail-blog', compact('article'));
    }

    public function service()
    {
        $displayServices = DisplayService::orderBy('id', 'desc')->get();
        $displayProfits = DisplayProfit::all();
        $displayConditions = DisplayCondition::all();
        $displayReviews = DisplayReview::all();

        return view('pages.landing.service', compact('displayServices', 'displayProfits', 'displayConditions', 'displayReviews'));
    }

    public function store()
    {
        return view('pages.landing.store');
    }
}

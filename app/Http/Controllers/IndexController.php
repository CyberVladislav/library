<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Article;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $services = Service::take(3)->get();
        $articles = Article::latest()->take(3)->get();

        return view('index.main', [
            'sliders' => $sliders,
            'services' => $services,
            'articles' => $articles,
        ]);
    }

    public function contacts()
    {
        return view('index.contacts');
    }

    public function services()
    {
        $services = Service::get();

        return view('index.services', [
            'services' => $services,
        ]);
    }
}

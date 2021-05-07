<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    public function list()
    {
        $articles = Article::latest()->get();

        return view('blog.list', [
            'articles' => $articles,
        ]);
    }

    public function item($slug)
    {
        $article = Article::where('slug', $slug)->first();

        return view('blog.item', [
            'article' => $article,
        ]);
    }
}

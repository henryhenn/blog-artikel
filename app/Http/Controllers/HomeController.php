<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'articles' => Article::latest()->get(),
            'categories' => Category::with('articles')->orderBy('keterangan')->get(),
        ]);
    }

    public function show(Article $article)
    {
        return view('single-post', compact('article'));
    }

    public function category()
    {

    }
}

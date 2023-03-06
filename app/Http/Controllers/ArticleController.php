<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.index', [
            'articles' => Article::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create', [
            'categories' => Category::orderBy('keterangan')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $data['foto'] = $request->file('foto')->store('foto');

        Article::create($data);

        return redirect()->route('articles.index')->with('message', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('comments');

        return view('article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy('keterangan')->get();

        return view('article.edit', compact(['categories', 'article']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            Storage::delete($article->foto);
            $data['foto'] = $request->file('foto')->store('foto');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('message', 'Artikel berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        Storage::delete($article->foto);

        return back()->with('message', 'Artikel berhasil dihapus!');
    }
}

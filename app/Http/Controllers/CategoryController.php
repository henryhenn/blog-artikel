<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', [
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required|string',
        ]);

        Category::create([
            'keterangan' =>$request->get('keterangan')
        ]);

        return redirect()->route('categories.index')->with('message', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'keterangan' => 'required|string',
        ]);

        $category->update([
            'keterangan' =>$request->get('keterangan')
        ]);

        return redirect()->route('categories.index')->with('message', 'Kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('message', 'Kategori berhasil dihapus!');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'article_id' => 'required',
            'nama' => 'required|string|max:100',
            'isi' => 'required|string'
        ]);

        Comment::create([
            'article_id' => $request->get('article_id'),
            'nama' => $request->get('nama'),
            'isi' => $request->get('isi'),
        ]);

        return redirect('post/' . $request->article_id . '#comment')->with('message', 'Komentar berhasil dipost!');
    }
}

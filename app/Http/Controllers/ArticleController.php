<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // GET /articles
    public function index()
    {
        return Article::all();
    }

    // GET /articles/{id}
    public function show(string $id)
    {
        return Article::findOrFail($id);
    }

    // POST /articles
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'category' => 'required|string',
            'date' => 'required|string',
            'image' => 'required|string',
            'content' => 'required|string',
        ]);

        return Article::create($validated);
    }

    // PUT/PATCH /articles/{id}
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return $article;
    }

    // DELETE /articles/{id}
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json([
            'message' => 'Artículo eliminado correctamente'
        ]);
    }
}

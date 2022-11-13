<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category','tags','media')->get();
        
        return view('article.index', compact('articles'));
    }
    // Auth panel
    public function dashboard()
    {
        $articles = Article::with('category')->paginate();
        return view('article.dashboard', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if($request->publish == "on"){
            $request->publish = true;
        }else{
            $request->publish = false;
        }
        $article = Article::create([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image_url' => 'photo.jpg',
            'publish' => $request->publish,
            'category_id' => $request->category_id,
        ]);
        $article->addMedia($request->image_url)->toMediaCollection();
        $article->tags()->sync($request->tags);

        return redirect()->route('article.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $getid=$article->tags->contains('id',5);
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if($request->publish == "on"){
            $request->publish = true;
        }else{
            $request->publish = false;
        }
        $article->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image_url' => 'photo.jpg',
            'publish' => $request->publish,
            'category_id' => $request->category_id,
        ]);
        $article->tags()->sync($request->tags);
        return redirect()->route('article.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect()->back();
    }
}

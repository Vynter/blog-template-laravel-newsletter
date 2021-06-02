<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole'])->only('create', 'store'); // faut étre log
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $q = request('q');
        $articles = Article::recherche($q)
            ->latest('id')
            ->with('user')
            ->paginate(10); /*using scopehome for the cache
            */

        $articles = Article::home();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3|max:255',
            'sub_title' => 'required',
            'body' => 'required',
            'published_at' => 'required|date',

            'image' => 'image',

        ]);

        $article = auth()->user()->articles()->create(request()->all() + [
            'slug' => Str::slug(request('title')),
            //'user_id' => auth()->id()
        ]); // mass Assignment
        Alert::success('Création de l\'article', 'Crée avec succée');
        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //retourne les articles qui ont le slug sur lequel t'as cliqué dans l'index
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        Cache::flush();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
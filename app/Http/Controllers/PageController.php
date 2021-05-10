<?php

namespace App\Http\Controllers;

use App\Article; //me
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //$articles = Article::orderBy('id', 'desc')->paginate(10);
        //$articles = Article::latest('id')->paginate(10);
        $articles = Article::recherche()->orderBy('id', 'desc')->paginate(10);
        return view('pages.index', compact('articles'));
    }

    public function show($slug)
    {
        //$article = Article::where('slug', $slug)->get(); //retourne une collection
        $article = Article::where('slug', $slug)->first(); //retourne premier

        return view('articles.show', compact('article'));
    }


    public function about()
    {
        return view('pages.about');
    }
    public function sample()
    {
        return view('pages.sample');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
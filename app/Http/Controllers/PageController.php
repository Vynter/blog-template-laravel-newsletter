<?php

namespace App\Http\Controllers;

use App\User;
use App\Article; //me
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function index()
    {
        //Alert::success('Success Title', 'Success Message');

        //$articles = Article::orderBy('id', 'desc')->paginate(10);
        //$articles = Article::latest('id')->paginate(10);
        $articles = Article::recherche()
            ->latest('id')
            ->with('user')
            ->paginate(10);
        //$articles = Article::home();
        return view('articles.index', compact('articles'));
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
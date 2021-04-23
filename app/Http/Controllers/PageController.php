<?php

namespace App\Http\Controllers;

use App\Article; //me
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);

        return view('pages.index', compact('articles'));
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
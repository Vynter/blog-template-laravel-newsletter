<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store()
    {
        request()->validate([
            'mail' => 'required|mail|unique:newsletter,mail' // unique dans la table newsletter dans le champ mail
        ]);

        Newsletter::create(request()->all());
        return back();
    }
}
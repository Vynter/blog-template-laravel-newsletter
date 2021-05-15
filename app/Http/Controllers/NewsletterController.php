<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store()
    {
        try {
            request()->validate([
                'mail' => 'required', // unique dans la table newsletter dans le champ mail
            ]);

            Newsletter::create(request()->all());
        } catch (\Throwable $th) {
            alert('Newsletter', 'Votre email existe déja', 'error');
            return back();
        }

        //Alert::info('Newsletter', 'Votre email a était enregistré');
        alert('Newsletter', 'Votre email a était enregistré', 'success');
        return back();
    }
}
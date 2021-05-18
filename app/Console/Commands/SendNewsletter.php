<?php

namespace App\Console\Commands;

use App\Article;
use Mail;
use App\Newsletter;
use Illuminate\Console\Command;
use App\Mail\Newsletter as MailNewsletter;

class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:send-newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie de la newsletter a tout les personnes inscrit';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$articles = Article::orderBy('id', 'desc')->limit(10)->get();
        $articles = Article::whereDate('published_at', '>=', now()->startOfWeek())->get();
        $users = Newsletter::all()->pluck('mail'); //['amine@gotmail.com','momo@gmail.com']; format optimal //$users = Newsletter::pluck('mail');
        foreach ($users as $email) {
            Mail::to($email)->send(new MailNewsletter($email, $articles));
            $this->info("Envoi de la newsletter à : '{$email}'.");
        }
    }
}

        /*for ($i = 0; $i < count($users); $i++) {
            $this->info("Envoi de la newsletter à : '{$users[$i]}'.");
        }*/
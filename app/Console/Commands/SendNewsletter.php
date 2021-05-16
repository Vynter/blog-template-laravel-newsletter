<?php

namespace App\Console\Commands;

use App\Newsletter;
use Illuminate\Console\Command;

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
        $users = Newsletter::all()->pluck('mail'); //['amine@gotmail.com','momo@gmail.com'];
        //$users = Newsletter::pluck('mail');
        foreach ($users as $email) {
            $this->info("Envoi de la newsletter à : '{$email}'.");
        }
    }
}

        /*for ($i = 0; $i < count($users); $i++) {
            $this->info("Envoi de la newsletter à : '{$users[$i]}'.");
        }*/
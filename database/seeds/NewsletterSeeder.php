<?php

use App\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');


        $data = [];
        //$user= User::pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            array_push($data, [
                'email' => $faker->email,
                //'user_id' => $faker->randomElement($user),
            ]);
        }


        Newsletter::insert($data);
    }
}
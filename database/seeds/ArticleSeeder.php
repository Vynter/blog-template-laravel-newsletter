<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        $user = App\User::pluck('id')->toArray();
        $data = [];
        $title = $faker->sentence(rand(6, 10)); // astuce pour le slug
        for ($i = 1; $i <= 100; $i++) {
            array_push($data, [
                'title' => $title,
                'sub_title' => $faker->sentence(rand(10, 15)),
                'slug' => Str::slug($title),
                'body' => $faker->realText(4000),
                'published_at' => $faker->dateTime(),
                'user_id' => $faker->randomElement($user),
            ]);
        }
        DB::table('articles')->insert($data);
    }
}
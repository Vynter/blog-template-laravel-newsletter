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

        for ($i = 1; $i <= 100; $i++) {
            $title = $faker->sentence(rand(4, 10)); // astuce pour le slug
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
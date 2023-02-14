<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {
            $new_article = new Article();
            $new_article->title = $faker->name();
            $new_article->slug = Article::slugGenerator($new_article->title);
            $new_article->url = $faker->company();
            $new_article->save();
        }
    }
}

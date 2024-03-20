<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articlesJson = File::get(database_path('data/articles.json'));
        $articles = json_decode($articlesJson, true);

        foreach ($articles as $articleData) {
            Article::create($articleData);
        }    }
}

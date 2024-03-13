<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function revisorDashboard()
    {
        $articles = Article::where('is_accepted', false)->get();
        return view('revisor.dashboard', compact('articles'));
    }

    public function articleDetail(Article $article)
    {
        return view ('revisor.article-detail' , compact('article'));
    }
}

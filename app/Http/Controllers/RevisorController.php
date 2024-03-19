<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function revisorDashboard()
    {
        $articles = Article::where('is_accepted', false)->get();
        return view('revisor.dashboard', compact('articles'));
    }

    public function acceptArticle(Article $article){
        $article->is_accepted = true;
        $article->save();

        return redirect()->route('revisor.dashboard');
    }

    public function rejectArticle(Article $article){
        $article->is_accepted = false;
        $article->save();

        return redirect()->route('revisor.dashboard');
    }


    public function articleDetail(Article $article)
    {
        return view('Revisor.article-detail', compact('article'));
    }

    public function home()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('articles'));
    }

    public function articles_by_category(Category $category){
        $articles = Article::where('category_id' , $category->id)->where('is_accepted' , true)->orderBy('created_at', 'DESC')->get();

        return view('article.category' , compact('articles', 'category')); 
    }



}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    public function acceptArticle(Article $article){
        $article->is_accepted = true;
        $article->save();

        return redirect()->route('revisor.dashboard')->with('message' , 'Hai accettato l\'articolo scelto');
    }

    public function rejectArticle(Article $article){
        $article->is_accepted = false;
        $article->save();

        return redirect()->route('revisor.dashboard')->with('message' , 'Hai rifiutato l\'articolo scelto');;
    }


    public function articleDetail(Article $article)
    {
        $article->is_accepted = NULL;
        $article->save();

        return redirect()->route('revisor.dashboard')->with('message' , 'Hai riportato l\'articolo scelto in revisione');;
    }

    public function home()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('articles'));
    }

    public function articles_by_category(Category $category){
        $articles = Article::where('category_id' , $category->id)->where('is_accepted' , true)->orderBy('created_at', 'DESC')->get();

        return view('article.bycategory' , compact('articles', 'category')); 
    }



}

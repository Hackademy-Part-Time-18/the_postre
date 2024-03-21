<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted' , true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted' , true)->orderby('created_at', 'desc')->get();
        return view('article.bycategory', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->orderby('created_at', 'desc')->get();
        return view('article.byuser', compact('user', 'articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required',
            'image' => 'image|required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/image'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);

        $tags = explode(',' , $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => $tag],
                ['name' => strtolower($tag)],
            );
            $article->tags()->attach($newTag);

        }

        return redirect(route('homepage'))->with('message', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->increment('views');
        $article->user->increment('views');
        $article->category->increment('views');
        
        return view('article.show', compact('article'));
    }

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    //article most view last week
    public function mostViewedArticlesLastWeek()
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        return Article::whereBetween('created_at', [$startDate, $endDate])->where('is_accepted' , true)->orderByDesc('views')->limit(4)->get();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}

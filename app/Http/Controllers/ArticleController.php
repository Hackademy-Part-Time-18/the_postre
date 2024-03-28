<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $articles = $user->articles()->where('is_accepted' , true)->orderby('created_at', 'desc')->get();
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
            'slug' => Str::slug($request->title),
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

        return redirect(route('homepage'))->with('success', 'Articolo creato correttamente');
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
        $this->middleware('auth')->except('index', 'show','byCategory','byUser');
    }

    //articoli piu visti settimana passata
    public function mostViewedArticlesLastWeek()
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        return Article::where('is_accepted' , true)->whereBetween('created_at', [$startDate, $endDate])->orderByDesc('views')->limit(4)->get();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit' , compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,'.$article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
         ]);

         if($request->image) {
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/image'),
            ]);
         }


        $tags = explode(',' , $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }
        $newTags= [];

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => $tag],
                ['name' => strtolower($tag)],
            );
           $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTag);

        return redirect(route('writer.dashboard'))->with('success', 'Hai correttamente aggiornato l\articolo scelto'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('writer.dashboard'))->with('success', 'Hai correttamente cancellato l\articolo scelto');
    }
}

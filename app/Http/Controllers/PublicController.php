<?php

namespace App\Http\Controllers;

use App\Mail\RequestRoleMail;
use App\Mail\SendContactMail;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage()
    {
        $mostViewedArticles = (new ArticleController())->mostViewedArticlesLastWeek();
        $articles = Article::where('is_accepted' , true)->orderBy('created_at', 'desc')->take(6)->get();
        $mostViewedCategories = Category::orderByDesc('views')->take(5)->get();
        $mostViewedUsers = User::orderByDesc('views')->take(5)->get();
        $mostViewedCategoriesCard = Category::orderByDesc('views')->take(3)->get();
        $mostViewedArticlesByCategory = Article::where('is_accepted' , true)->with('category')->orderBy('category_id')->orderByDesc('views')->get()->groupBy('category_id')->take(5)->map(
            function ($articles) {
            return $articles->take(3);
        });
        $mostViewedArticlesByEstero = Article::where('category_id', 6)->where('is_accepted' , true)->orderBy('category_id')->orderByDesc('views')->get()->groupBy('category_id'== 5)->map(
            function ($articles) {
            return $articles->take(3);
        });

        return view('homepage', compact('articles','mostViewedArticles','mostViewedCategories','mostViewedUsers','mostViewedCategoriesCard','mostViewedArticlesByCategory', 'mostViewedArticlesByEstero'));
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }


    public function careers()
    {
        return view('careers');
    }

    public function sendRoleRequest(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->input('role');
        $email = $request->input('email');
        $message = $request->input('message');
        $requestMail = new RequestRoleMail(compact('role', 'email', 'message'));

        Mail::to('admin@thepostre.it')->send($requestMail);

        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;

            case 'revisor':
                $user->is_revisor = NULL;
                break;

            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect()->route('homepage')->with('success', 'Grazie per averci contattato!');
    }

    public function workWithUs()
    {
        return view('workwithus');
    }

    public function send(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
                'phone' => 'required',
            ]
        );
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $phone = $request->input('phone');
        $requestMail = new SendContactMail(compact('name', 'email', 'message', 'phone'));
        Mail::to('admin@thepostre.it')->send($requestMail);
        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato!');
    }

    public function searchArticle(Request $request)
    {
        $key = $request->input('key');
        $articles = Article::search($key)->where('is_accepted', true)->get();
        return view('article.index', compact('articles', 'key'));
    }

    public function category()
    {
        return view('article.bycategory');
    }

    public function user()
    {
        return view('user');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{    
   public function homepage () {
    $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        return view('home', compact('articles'));
    }
    public function login () {
            return view('auth.login');
        }
        public function register () {
            return view('auth.register');
        }
}

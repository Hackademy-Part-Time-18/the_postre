<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{    
   public function homepage () {
    $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('articles'));
    }
    public function login () {
            return view('auth.login');
        }
        public function register () {
            return view('auth.register');
        }


    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        dd($request->all());
    }
}

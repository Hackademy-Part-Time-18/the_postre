<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{    
   public function homepage () {
     $articles= Article::latest()->take(6)->get();
        return view('homepage', compact('articles'));
    }
}

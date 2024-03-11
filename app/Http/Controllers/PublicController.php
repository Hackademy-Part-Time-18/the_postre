<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;

class PublicController extends Controller
{
    protected $url;
    public function homepage()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('articles'));
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function navbar($url = null) {
        $urlPath = parse_url(url()->previous(), PHP_URL_PATH); // Ottieni il percorso dell'URL precedente
    
        // Verifica se l'URL precedente contiene un hash, come /#example
        if (strpos($urlPath, '#') !== false) {
            return redirect()->to('#page-top');
        }
    
        // Se l'URL attuale è / o /homepage o nessun valore è stato fornito
        if ($url === '/' || $url === 'homepage' || $url === null) {
            return redirect()->to('#page-top');
        } else {
            return redirect()->route('homepage');
        }
    }    
    
}

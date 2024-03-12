<?php

namespace App\Http\Controllers;

use App\Mail\RequestRoleMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

    private $url;
    public function homepage()
    {
        $navbar = true;
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('articles' , 'navbar'));
    }
    public function login () {
            return view('auth.register');
        }
        public function register () {
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
       $presentation = $request->input('presentation');
       $requestMail = new RequestRoleMail(compact('role', 'email', 'presentation'));

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

       return redirect(route('homepage'))->with('message' , 'Grazie per averci contattato!');

    }
    public function workWithUs()
    {
        return view('workWithUs');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Mail\CareerRequestMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

       $user = Auth::user();
       $role = $request->role;
       $email = $request->email;
       $message = $request->message;

       Mail::to('admin@thepostre.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));

       switch ($variable) {
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
}

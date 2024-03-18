<?php

namespace App\Http\Controllers;

use App\Mail\RequestRoleMail;
use App\Mail\SendContactMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

    public function homepage()
    {
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
        return view('workwithus');
    }
    
    public function send(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'message'=>'required',
                'phone'=>'required',
            ]
        );
        $name= $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $phone = $request->input('phone');
        $requestMail = new SendContactMail(compact('name','email','message','phone'));
        Mail::to('admin@thepostre.it')->send($requestMail);
        return redirect(route('homepage'))->with('message' , 'Grazie per averci contattato!');

    }

    public function searchArticle(Request $request)
    { 
        $key = $request->input('key');
        $articles = Article::search($key)->where('is_accepted', true)->get();
        return view('article.index' , compact('articles', 'key')); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Article;
use App\Mail\ContactShiwaki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store()
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        $articles = Article::latest()->get()->take(3);

        Mail::to(request('email'))
            ->send(new ContactShiwaki($articles));

        return redirect('/')
            ->with('message', 'Barua pepe imetumwa');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $data1 = 'About us - Online Store';
        $data2 = 'About us';
        $description = 'This is an about page ...';
        $author = 'Developed by: Your Name';

        return view('home.about')->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('author', $author);
    }

    public function contact(): View
    {
        $data1 = 'Contact - Online Store';
        $data2 = 'Contact';
        $tel = 'Tel: 38390403';
        $mail = 'E-mail: empresarandom@email.com';

        return view('home.contact')->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('telephone', $tel)
        ->with('mail', $mail);
    }
}

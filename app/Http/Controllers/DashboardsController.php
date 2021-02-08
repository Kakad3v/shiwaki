<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'projects' => auth()->user()->accessibleRequests()->latest()->get(),
            'articles' => auth()->user()->articles()->latest()->get(),
            'stories' => auth()->user()->stories()->latest()->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\AdminCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index' ]  ]);
    }

    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdminCategory::all();

        $compact = compact('categories');

        return view('website.home.welcome', $compact);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('website.home.index');
    }
}

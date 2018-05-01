<?php

namespace App\Http\Controllers\Website;

use JavaScript;
use Illuminate\Http\Request;
use App\Models\Admin\AdminCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index' ] ]);
    }

    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdminCategory::all();
        $categories->load('services');

        $compact = compact('categories');

        JavaScript::put([
            'categories' => $categories
        ]);

        return view('website.home.welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = AdminCategory::all();
        $categories->load('services');

        $compact = compact('categories');
        JavaScript::put([
            'categories' => $categories
        ]);

        return view('website.home.index');
    }
}

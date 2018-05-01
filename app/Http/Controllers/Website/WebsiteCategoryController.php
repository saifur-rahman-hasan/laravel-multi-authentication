<?php

namespace App\Http\Controllers\Website;

use JavaScript;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Admin\AdminCategory;

class WebsiteCategoryController extends Controller
{
    public function index()
    {
        $categories = AdminCategory::all();

        $compact = compact('categories');

        JavaScript::put([
            'categories' => $categories
        ]);
        return view('website.categories.index');
    }

    public function show($id)
    {
        $category = AdminCategory::findOrFail($id);
        $category->load('services');

        $compact = compact('category');

        JavaScript::put([
            'category' => $category
        ]);
        return view('website.categories.show', $compact);
    }

    public function showServices($categoryId)
    {
        $categories = AdminCategory::all();
        $category = AdminCategory::findOrFail($categoryId);
        $category->load('services');

        $compact = compact('categories', 'category');
        return view('website.categories.showServices', $compact);
    }
}

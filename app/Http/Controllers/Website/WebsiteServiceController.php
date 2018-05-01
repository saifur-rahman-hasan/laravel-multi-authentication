<?php

namespace App\Http\Controllers\Website;

use App\Models\Admin\AdminCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Admin\AdminService;


class WebsiteServiceController extends Controller
{
    public function index()
    {
        $services = AdminService::all();
        $categories = AdminCategory::all();

        $compact = compact('services', 'categories');

        return view('website.services.index', $compact);
    }

    public function show($id)
    {
        $service = AdminService::findOrFail($id);

        $compact = compact('service');

        return view('website.services.show', $compact);
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Models\Admin\AdminService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteTaskController extends Controller
{
    public function index()
    {
        $tasks = AdminTask::all();

        $compact = compact('tasks');

        return view('website.tasks.index', $compact);
    }

    public function show($id)
    {
        $task = AdminTask::findOrFail($id);

        $compact = compact('task');

        return view('website.task.show', $compact);
    }
}

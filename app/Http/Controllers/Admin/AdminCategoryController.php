<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Requests
use App\Http\Requests\Admin\AdminCategoryStoreRequest;

use App\Models\Admin\AdminCategory;

class AdminCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdminCategory::all();
        return view('admin.categories.index', compact('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategoryStoreRequest $request)
    {
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file_name          =   date('Ymdhis').'.'.$request->photo->extension();
            $request->photo->storeAs('public/images/categories', $file_name);
            $request['image'] = $file_name;
        }

        $request['slug'] = ($request->has('slug') && !empty($request->slug)) ? str_slug($request->slug, '-') : str_slug($request->name, '-');

        $category = AdminCategory::create($request->all());

        flash()->overlay("Category has been created.");
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = AdminCategory::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = AdminCategory::findOrFail($id);
        $category->update(request()->all());
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = AdminCategory::findOrFail($id);
        dd($category);
        $category->delete();
        flash()->overlay('Category has been removed');
        return redirect()->back();
    }
}

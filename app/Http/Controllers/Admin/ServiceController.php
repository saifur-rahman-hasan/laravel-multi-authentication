<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Requests
use App\Http\Requests\ServiceCreateRequest;

// Models
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('dashboard-admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard-admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        
        if($request->hasFile('service_cover_photo')) {       
    
            $file = $request->file('service_cover_photo');
            $path = $file->store('public/avatars');

            $service = Service::create([
                'name'  =>  $request->service_name,
                'title' => $request->service_title,
                'sub_title' => $request->service_sub_title,
                'description' => $request->service_description,
                'cover_photo_url' => $path,
                'category_id'  => $request->category_id
            ]);
            
            if($request->has('questions')){

                foreach($request->questions as $key => $question){

                    $service->questions()->create([
                        'question' => $question,
                        'option_type' => $request->option_types[$key],
                        'options' => $request->options[$key]
                    ]);

                }
                       
            }

            return response()->json([
                'status' => 200,
                'message'   =>  'Service has been created successfully.'
            ]);
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        $service->load('questions');
        // return response()->json($service);
        return view('dashboard-admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $service->load('questions');
        $categories = Category::all();
        return view('dashboard-admin.services.edit', compact('service', 'categories'));
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
        $service = Service::findOrFail($id);
        $service->load('questions');

        $service->update([
            'name' => request()->service_name,
            'title' => request()->service_title,
            'sub_title' => request()->service_sub_title,
            'description' => request()->service_description,
            'category_id' => request()->category_id,
        ]);
        
        if(count($service->questions)){

            if($request->has('questions')){
                
                // Remove all old questions
                foreach($service->questions as $service_question) {

                    $service_question->delete();

                }
                
                // Add new questions
                foreach($request->questions as $key => $question){

                    if($request->option_types[$key] === 'radio') {

                        $service->questions()->create([
                            'question' => $question,
                            'option_type' => $request->option_types[$key],
                            'options' => $request->options[$key]
                        ]);

                    }

                    if($request->option_types[$key] === 'checkbox') {

                        $service->questions()->create([
                            'question' => $question,
                            'option_type' => $request->option_types[$key],
                            'options' => $request->options[$key]
                        ]);

                    }

                    if($request->option_types[$key] === 'text') {

                        $service->questions()->create([
                            'question' => $question,
                            'option_type' => $request->option_types[$key],
                            'options' => []
                        ]);

                    }

                    if($request->option_types[$key] === 'textarea') {

                        $service->questions()->create([
                            'question' => $question,
                            'option_type' => $request->option_types[$key],
                            'options' => []
                        ]);

                    }

                }
                
                return request()->all();
                       
            }

        }else{
            // return request()->all();
            
            if($request->has('questions')){

                foreach($request->questions as $key => $question){

                    $service->questions()->create([
                        'question' => $question,
                        'option_type' => $request->option_types[$key],
                        'options' => $request->options[$key]
                    ]);

                }
                       
            }

            return response()->json([
                'status' => 200,
                'message'   =>  'Service has been created successfully.'
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

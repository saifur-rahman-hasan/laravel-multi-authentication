<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminCategory;
use App\Models\Admin\AdminService;
class AdminServiceController extends Controller
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
        $services = AdminService::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AdminCategory::all();
        return view('admin.services.create', compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file_name          =   date('Ymdhis').'.'.$request->photo->extension();
            $request->photo->storeAs('public/images/services', $file_name);
            $request['image'] = $file_name;
        }

        $service = AdminService::create($request->all());

        if($service && $request->has('questions')){

            foreach($request->questions as $key => $question){

                $service->questions()->create([
                    'question' => $question,
                    'option_type' => $request->option_types[$key],
                    'options' => $request->options[$key]
                ]);

            }
                    
        }

        if($service){
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
        return $this->edit();      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = AdminService::findOrFail($id);
        $service->load('questions');
        $categories = AdminCategory::all();
        return view('admin.services.edit', compact('service', 'categories'));
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
        // dd(request()->all());
        $service = AdminService::findOrFail($id);
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

                return response()->json([
                    'status' => 200,
                    'message'   =>  'Service has been created successfully.'
                ]);
                       
            }

        }else{
            
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

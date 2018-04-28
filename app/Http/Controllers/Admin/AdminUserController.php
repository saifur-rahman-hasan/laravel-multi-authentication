<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
class AdminUserController extends Controller
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
        if(request()->has('role')){
            switch (request()->role) {
                case 'admin':
                    $users = Admin::whereIn('role', ['super-admin', 'admin'])->get();
                    break;

                case 'service-provider':
                    $users = Admin::where('role', 'service-provider')->get();
                    break;

                case 'customer':
                    $users = User::where('role', 'customer')->get();
                    break;
                
                default:
                    $users = [];
                    break;
            }
        }else{
            $users = User::all();
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->has('role') && !empty(request()->role)){
            
            switch (request()->role) {
                case 'customer':
                    $user = User::create(request()->all());
                    flash()->overlay('New Customer has been created.');
                    return redirect()->route('admin.users.index');
                    break;
                
                default:
                    $admin = Admin::create(request()->all());
                    flash()->overlay('New user has been created');
                    return redirect()->route('admin.users.index');
                    break;
            }

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
        dd("Sorry!, Service unavailable right now.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->has('role')){
            switch (request()->role) {
                case 'super-admin':
                    $user = Admin::findOrFail($id);
                    $user = ($user->hasRole(request()->role)) ? $user : [];                
                    return  view('admin.users.edit',compact('user'));

                    break;
                    
                case 'admin':
                    $user = Admin::findOrFail($id);
                    $user = ($user->hasRole(request()->role)) ? $user : [];
                    return  view('admin.users.edit',compact('user'));
                    
                    break;
                    
                case 'service-provider':
                    $user = Admin::findOrFail($id);
                    $user = ($user->hasRole(request()->role)) ? $user : [];
                    return  view('admin.users.edit',compact('user'));
                break;
                    
                    case 'customer':
                    $user = User::findOrFail($id);
                    $user = ($user->hasRole(request()->role)) ? $user : [];
                    
                    return  view('admin.users.edit',compact('user'));
                    return  view('admin.users.edit');
                break;

                default:
                    return abort(404);
                    break;
            }
        }else{
            return abort(404);
        }
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
        if(request()->has('role')){
            switch (request()->role) {
                
                case 'super-admin':
                    $user = Admin::findOrFail($id);
                    if($user->hasRole(request()->role)){
                        $user = $user;
                        $user->update(request()->all());
                    }else{
                        $user = [];
                    }

                    if(!empty($user)){
                        flash()->success('Information saved successfully.');
                        return redirect()->back()->withInput([ 'id' => $user->id, 'role' => $user->role ]);
                    }else{
                        return abort(404);
                    }

                    break;

                case 'admin':
                    $user = Admin::findOrFail($id);
                    if($user->hasRole(request()->role)){
                        $user = $user;
                        $user->update(request()->all());
                    }else{
                        $user = [];
                    }


                    if(!empty($user)){
                        flash()->success('Information saved successfully.');
                        return redirect()->back()->withInput([ 'id' => $user->id, 'role' => $user->role ]);
                    }else{
                        return abort(404);
                    }

                    break;

                case 'service-provider':
                    $user = Admin::findOrFail($id);
                    if($user->hasRole(request()->role)){
                        $user = $user;
                        $user->update(request()->all());
                    }else{
                        $user = [];
                    }
                    
                    if(!empty($user)){
                        flash()->success('Information saved successfully.');
                        return redirect()->back()->withInput([ 'id' => $user->id, 'role' => $user->role ]);
                    }else{
                        return abort(404);
                    }

                    break;
                
                case 'customer':
                    $user = User::findOrFail($id);
                    
                    if($user->hasRole(request()->role)){
                        $user = $user;
                        $user->update(request()->all());
                    }else{
                        $user = [];
                    }
                    
                    if(!empty($user)){
                        flash()->overlay('Information saved successfully.');
                        return redirect()->back()->withInput([ 'id' => $user->id, 'role' => $user->role ]);
                    }else{
                        return abort(404);
                    }
                break;

                default:
                    return abort(404);
                    break;
            }
        }else{
            return abort(404, 'Sorry! Service is currently unavailable.');
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

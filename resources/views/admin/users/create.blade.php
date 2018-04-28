@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @component('admin.users.components.page-header', [ 'title' => 'Create new user' ])
    @endcomponent
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        
        <!-- Simple panel -->
        {{ Form::open([ 'url' => route('admin.users.store'), 'class' => 'form-horizontal', 'autocomplete' => 'off' ]) }}
        <div class="panel panel-flat">
            <div class="panel-heading">
                {{-- <h5 class="panel-title">Create User</h5> --}}
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <!-- First name -->
                <div class="form-group">
                    <label for="first_name" class="control-label col-sm-3 text-right">First name</label>
                    <div class="col-sm-5">
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                </div>

                <!-- Last name -->
                <div class="form-group">
                    <label for="last_name" class="control-label col-sm-3 text-right">Last name</label>
                    <div class="col-sm-5">
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3 text-right">Email</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="control-label col-sm-3 text-right">Password</label>
                    <div class="col-sm-5">
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>

                <!-- User Role -->
                <div class="form-group">
                    <label for="user_role" class="control-label col-sm-3 text-right">User Role</label>
                    <div class="col-sm-5">
                        <select name="role" class="form-control">
                            <option value="customer">Customer</option>
                            <option value="service-provider">Service Provider</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                
                <!-- Activated -->
                <div class="form-group">
                    <label for="user_role" class="control-label col-sm-3 text-right">Activated</label>
                    <div class="col-sm-5">
                        <label class="radio-inline"><input type="radio" name="active" value="1" checked>Yes</label>
                        <label class="radio-inline"><input type="radio" name="active" value="0">No</label>
                    </div>
                </div>

            </div>

            <div class="panel-footer" style="padding-left: 7px;">
                <button type="submit" class="btn btn-sm btn-primary">Create</button>
            </div>
        </div>
        {{ Form::close() }}
        <!-- /simple panel -->

    </div>
    <!-- /content area -->

    
@endsection

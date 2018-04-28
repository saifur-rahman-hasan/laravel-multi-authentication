@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @component('admin.users.components.page-header', [ 'title' => 'All users' ])
    @endcomponent
    <!-- /page header -->
    
    
    <!-- Content area -->
    <div class="content">
        
        @if(count($users))
        <!-- Customer List panel -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                {{-- <h5 class="panel-title">All Users</h5> --}}
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Fist name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->active_status }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li><a href="{{ route('admin.users.edit', [ 'id' => $user->id, 'role' => $user->role ]) }}">Edit</a></li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /Customer List panel -->
        @else
            <div class="alert alert-sm alert-danger alert-important">
                Sorry! No user found to show.
            </div>
        @endif
    </div>
    <!-- /content area -->

    
@endsection

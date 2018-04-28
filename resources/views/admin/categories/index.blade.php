@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @component('admin.categories.components.page-header', [ 'title' => 'All categories' ])
    @endcomponent
    <!-- /page header -->
    
    
    <!-- Content area -->
    <div class="content">
        
        @if(count($categories))
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ asset($category->getImage()) }}" class="img-circle img-xs" alt="{{ $category->name }}'s image">
                                    </div>
                                </div>
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <ul class="list-inline">
                                    <li><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a></li>
                                    {{-- <li><a href="{{ route('admin.categories.destroy', $category->id) }}">Delete</a></li> --}}
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

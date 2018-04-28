@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @component('admin.categories.components.page-header', [ 'title' => 'All services' ])
    @endcomponent
    <!-- /page header -->
    
    
    <!-- Content area -->
    <div class="content">
        
        @if(count($services))
        <!-- Admin Services List panel -->
        <table class="table datatable-basic table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Service Name</th>
                    <th>Service Title</th>
                    <th>Categgory Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset($service->getImage()) }}" class="img-circle img-xs" alt="{{ $service->name }}'s image">
                            </div>
                        </div>
                    </td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->category->name }}</td>
                    <td class="text-center">
                        
                        <ul class="icons-list">
                            <li><a href="{{ route('admin.services.edit', $service->id) }}"><i class="icon-pencil"></i> Edit</a></li>
                        </ul>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /Admin Service List panel -->
        @else
            <div class="alert alert-sm alert-danger alert-important">
                Sorry! No service found to show.
            </div>
        @endif
    </div>
    <!-- /content area -->

    
@endsection

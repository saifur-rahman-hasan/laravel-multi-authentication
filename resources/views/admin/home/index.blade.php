@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @include('admin.home.components.page-header')
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        
        <!-- Simple panel -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Admin Panel</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                @if(auth()->user()->hasRole('super-admin'))
                    You are an Admin User
                @else
                @endif
            </div>
        </div>
        <!-- /simple panel -->

    </div>
    <!-- /content area -->

    
@endsection

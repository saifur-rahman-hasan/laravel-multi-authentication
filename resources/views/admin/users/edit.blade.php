@extends('admin.layouts.app')

@section('body-attrs')
class="sidebar-xs has-detached-left"
@stop

@section('content')

    <br><br>

    <!-- Page header -->
    @component('admin.users.components.page-header', [ 'title' => 'Edit user information' ])
    @endcomponent
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        
        <!-- Detached sidebar -->
        <div class="sidebar-detached">
            <div class="sidebar sidebar-default sidebar-separate">
                <div class="sidebar-content">

                    <!-- User details -->
                    <div class="content-group">
                        <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                            <div class="content-group-sm">
                                <h6 class="text-semibold no-margin-bottom">
                                    {{ $user->name }}
                                </h6>

                                <span class="display-block">{{ ucwords($user->role) }}</span>
                            </div>

                            <a href="#" class="display-inline-block content-group-sm">
                                <img src="{{ $user->profile_photo }}" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
                            </a>

                            {{-- <ul class="list-inline list-inline-condensed no-margin-bottom">
                                <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
                                <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
                            </ul> --}}
                        </div>

                        <div class="panel no-border-top no-border-radius-top">
                            <ul class="navigation">
                                <li class="navigation-header">Navigation</li>
                                <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-files-empty"></i> Profile Information</a></li>
                                {{-- <li><a href="#schedule" data-toggle="tab"><i class="icon-files-empty"></i> Requested Services</a></li> --}}
                                {{-- <li><a href="#messages" data-toggle="tab"><i class="icon-files-empty"></i> Customer Services <span class="badge bg-warning-400">23</span></a></li> --}}
                                {{-- <li><a href="#orders" data-toggle="tab"><i class="icon-files-empty"></i> Orders</a></li> --}}
                                {{-- <li class="navigation-divider"></li> --}}
                                {{-- <li><a href="login_advanced.html"><i class="icon-switch2"></i> Log out</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- /user details -->

                </div>
            </div>
        </div>
        <!-- /detached sidebar -->

        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">

                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="profile">

                        <!-- Profile info -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Profile information</h6>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                
                                {{ Form::model($user, [
                                    'url' => route('admin.users.update', ['id' => $user->id, 'role' => $user->role]),
                                    'class' => 'form-horizontail',
                                    'method' => 'put'
                                ]) }}

                                    

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>First name</label>
                                                {!! Form::text('first_name', null, [ 'class' => 'form-control' ]) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last name</label>
                                                {!! Form::text('last_name', null, [ 'class' => 'form-control' ]) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Primary Email</label>
                                                {!! Form::email('email', null, [ 'class' => 'form-control' ]) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label>Username</label>
                                                {!! Form::text('username', null, [ 'class' => 'form-control' ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profile Photo</label>
                                                <input type="file" class="file-input">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Activate</label>
                                                <div>
                                                    <label class="radio-inline"><input type="radio" name="active" value="1" checked>Yes</label>
                                                    <label class="radio-inline"><input type="radio" name="active" value="0">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                        <!-- /profile info -->

                    </div>
                </div>
                <!-- /tab content -->

            </div>
        </div>
        <!-- /Detached content -->
    
    </div>
    <!-- /Content area -->
@stop

@push('scripts-plugin')
<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
@endpush

@push('scripts')
<script>

    //
    // Define variables
    //

    // Modal template
    var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
        '  <div class="modal-content">\n' +
        '    <div class="modal-header">\n' +
        '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
        '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
        '    </div>\n' +
        '    <div class="modal-body">\n' +
        '      <div class="floating-buttons btn-group"></div>\n' +
        '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
        '    </div>\n' +
        '  </div>\n' +
        '</div>\n';

    // Buttons inside zoom modal
    var previewZoomButtonClasses = {
        toggleheader: 'btn btn-default btn-icon btn-xs btn-header-toggle',
        fullscreen: 'btn btn-default btn-icon btn-xs',
        borderless: 'btn btn-default btn-icon btn-xs',
        close: 'btn btn-default btn-icon btn-xs'
    };

    // Icons inside zoom modal classes
    var previewZoomButtonIcons = {
        prev: '<i class="icon-arrow-left32"></i>',
        next: '<i class="icon-arrow-right32"></i>',
        toggleheader: '<i class="icon-menu-open"></i>',
        fullscreen: '<i class="icon-screen-full"></i>',
        borderless: '<i class="icon-alignment-unalign"></i>',
        close: '<i class="icon-cross3"></i>'
    };

    // File actions
    var fileActionSettings = {
        zoomClass: 'btn btn-link btn-xs btn-icon',
        zoomIcon: '<i class="icon-zoomin3"></i>',
        dragClass: 'btn btn-link btn-xs btn-icon',
        dragIcon: '<i class="icon-three-bars"></i>',
        removeClass: 'btn btn-link btn-icon btn-xs',
        removeIcon: '<i class="icon-trash"></i>',
        indicatorNew: '<i class="icon-file-plus text-slate"></i>',
        indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
        indicatorError: '<i class="icon-cross2 text-danger"></i>',
        indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
    };
    
    //
    // Basic example
    //

    $('.file-input').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus"></i>',
        uploadIcon: '<i class="icon-file-upload2"></i>',
        removeIcon: '<i class="icon-cross3"></i>',
        layoutTemplates: {
            icon: '<i class="icon-file-check"></i>',
            modal: modalTemplate
        },
        initialCaption: "No file selected",
        previewZoomButtonClasses: previewZoomButtonClasses,
        previewZoomButtonIcons: previewZoomButtonIcons,
        fileActionSettings: fileActionSettings
    });
</script>
@endpush
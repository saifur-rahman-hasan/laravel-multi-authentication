@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @component('admin.categories.components.page-header', [ 'title' => 'Create Service Category' ])
    @endcomponent
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        
        <!-- Simple panel -->
        {{ Form::open([ 'url' => route('admin.categories.store'), 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true ]) }}
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

                <!-- Category name -->
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="control-label col-sm-3 text-right">Category Name</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" class="form-control" required>
                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <!-- Category Slug -->
                <div class="form-group">
                    <label for="slug" class="control-label col-sm-3 text-right">Category slug</label>
                    <div class="col-sm-5">
                        <input type="text" name="slug" class="form-control">
                    </div>
                </div>

                <!-- Category Description -->
                <div class="form-group">
                    <label for="email" class="control-label col-sm-3 text-right">Category Description</label>
                    <div class="col-sm-5">
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>

                <!-- Category Image -->
                <div class="form-group">
                    <label for="photo" class="control-label col-sm-3 text-right">Image</label>
                    <div class="col-sm-5">
                        <input type="file" name="photo" class="file-input">
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

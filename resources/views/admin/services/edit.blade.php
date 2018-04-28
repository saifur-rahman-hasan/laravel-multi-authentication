@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    @component('admin.categories.components.page-header', [ 'title' => 'Create new service' ])
    @endcomponent
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        <!-- Form - User Create -->
        {{ Form::model($service, [ 
            'route' => [ 'admin.services.update', $service->id ], 
            'method' => 'put', 
            'class' => 'form-horizontal form-edit-service',
            'files' => true 
        ]) }}
        <!-- Submit form with AJAX -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">Edit service</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

                <fieldset class="step" id="ajax-step1">
                    <h6 class="form-wizard-title text-semibold">
                        <span class="form-wizard-count">1</span>
                        Service info
                        <small class="display-block">Tell us a bit about your service</small>
                    </h6>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label text-right">Service name:</label>
                        <div class="col-sm-6">
                            <input type="text" name="service_name" class="form-control" placeholder="Your service name" value="{{ $service->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label text-right">Service title:</label>
                        <div class="col-sm-6">
                            <input type="text" name="service_title" class="form-control" placeholder="Service title / tagline" value="{{ $service->title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label text-right">Service sub-title:</label>
                        <div class="col-sm-6">
                            <input type="text" name="service_sub_title" class="form-control" placeholder="Service sub-title" value="{{ $service->sub_title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label text-right">Service description:</label>
                        <div class="col-sm-6">
                            <textarea  name="service_description" class="form-control" placeholder="Service description">{{ $service->description }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label text-right">Service category:</label>
                        <div class="col-sm-6">
                            @if(count($categories))
                            <select name="category_id" data-placeholder="Select service category" class="select">
                                <option></option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $service->category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <fieldset class="step" id="ajax-step2">
                    
                    <h6 class="form-wizard-title text-semibold">
                        <span class="form-wizard-count">2</span>
                        Upload Service cover photo
                        <small class="display-block">Change your service apperance.</small>
                    </h6>

                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div>
                                <img src="{{ $service->image }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label text-right">Service cover photo:</label>
                        <div class="col-sm-6">
                            <input name="service_cover_photo" type="file" class="file-styled">
                            <span class="help-block">Accepted formats: jpg, jpeg, png. and Max file size: 4Mb</span>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="step" id="ajax-step3">
                    <h6 class="form-wizard-title text-semibold">
                        <span class="form-wizard-count">3</span>
                        Service questions
                        <small class="display-block">Add your service related questions whice will be asked to the customer.</small>
                    </h6>

                    <!-- Questions wrapper -->
                    <div id="questions_wrapper">

                        @if(count($service->questions))
                            
                            @foreach($service->questions as $service_question_key => $service_question)
                            {!! ($service_question_key === 0) ? '' : '<hr>' !!}
                            <div class="question" data-question="{{ $service_question_key }}">
                                
                                <!-- Question -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label text-right">Question</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="question_ids[]" value="{{ $service_question->id }}">
                                        <input type="text" name="questions[]" class="form-control" placeholder="Write your question." value="{{ $service_question->question }}">
                                    </div>
                                </div>

                                <!-- Option Type -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label text-right">Option Type</label>
                                    <div class="col-sm-6">
                                        <select name="option_types[]" data-placeholder="Select option type" class="select">
                                            <option></option>
                                            <option value="radio" {{ ($service_question->option_type === 'radio') ? 'selected' : '' }}>Radio</option>
                                            <option value="checkbox" {{ ($service_question->option_type === 'checkbox') ? 'selected' : '' }}>Checkbox</option>
                                            <option value="text" {{ ($service_question->option_type === 'text') ? 'selected' : '' }}>Text</option>
                                            <option value="textarea" {{ ($service_question->option_type === 'textarea') ? 'selected' : '' }}>Textarea</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Options - radio -->
                                @if($service_question->option_type == 'radio' || $service_question->option_type == 'checkbox')
                                    @if(!empty($service_question->options))
                                    <div class="options-group">
                                        
                                        @foreach($service_question->options as $option_key => $option)
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label text-right">Options</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" name="options[{{ $option_key }}][]" class="form-control" placeholder="Write your option" value="{{ $option }}">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default add_option" type="button">
                                                            <i class="icon-plus3"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    @endif
                                @endif

                            </div>
                            @endforeach

                        @else
                            <div class="question" data-question="0">
                        
                                <!-- Question -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label text-right">Question</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="questions[]" class="form-control" placeholder="Write your question.">
                                    </div>
                                </div>

                                <!-- Option Type -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label text-right">Option Type</label>
                                    <div class="col-sm-6">
                                        <select name="option_types[]" data-placeholder="Select option type" class="select">
                                            <option></option>
                                            <option value="radio">Radio</option>
                                            <option value="checkbox">Checkbox</option>
                                            <option value="text">Text</option>
                                            <option value="textarea">Textarea</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Options - radio -->
                                <div class="options-group">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-right">Options</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="text" name="options[0][]" class="form-control" placeholder="Write your option">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default add_option" type="button">
                                                        <i class="icon-plus3"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif

                    </div>
                    <!-- End Questions wrapper -->

                    <hr>

                    <!-- Add More question button -->
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <a href="#" class="btn bg-slate btn-labeled heading-btn" id="add_question">
                                <b><i class="icon-plus3"></i></b> Add new question
                            </a>
                        </div>
                    </div>

                </fieldset>

                <div class="form-wizard-actions">
                    <button class="btn btn-default" id="ajax-back" type="reset">Back</button>
                    <button class="btn btn-info" id="ajax-next" type="submit">Next</button>
                </div>
            
            <!-- <div id="ajax-data"></div> -->
            
        </div>
        <!-- /submit form with AJAX -->
        {{ Form::close() }}
        <!-- End Form - User Create -->

    </div>
    <!-- /content area -->    
@endsection


@push('scripts-plugin')
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/wizards/form_wizard/form.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/wizards/form_wizard/form_wizard.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/validation/validate.min.js') }}"></script>
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pages/wizard_form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/services/update.js') }}"></script>
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

<script>
    $(function(){

        // AJAX form submit
        $(".form-edit-service").formwizard({
            disableUIStyles: true,
            validationEnabled: true,
            formPluginEnabled: true,
            disableInputFields: false,
            inDuration: 150,
            outDuration: 150,
            formOptions :{
                success: function(data){
                    console.log(data);
                    swal({title: "Congratulations!", text: `${data.message}`, type: "success", timer: 2000, confirmButtonColor: "#43ABDB"})
                },
                beforeSubmit: function(data){
                    $("#ajax-data").css({borderTop: '1px solid #ddd', padding: 15}).html("<span class='text-semibold'>Data sent to the server:</span> " + $.param(data));
                },
                dataType: 'json',
                resetForm: true
            }
        });

    });
</script>
@endpush
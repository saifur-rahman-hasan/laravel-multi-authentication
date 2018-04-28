let question_count = 0;

// Add new question
$('#add_question').click(function(event){
    event.preventDefault();

    question_count++;

    let question_template = `
        <hr>
        <div class="question" data-question="${question_count}">
                        
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
                    <select name="option_types[]" data-placeholder="Select option type" class="select select-option form-control" onchange="getOptionField(event);">
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
                    <label class="col-md-3 control-label text-right">Options</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="options[${question_count}][]" class="form-control" placeholder="Write your option">
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
    `;

    $('#questions_wrapper').append(question_template);

    // Re-Initialize the select 2 plugin
    $('.select').select2();

});



// Add Option
$("#questions_wrapper").delegate('.add_option', 'click', function(event){
    event.preventDefault();

    const options_group_elem = '.options-group'; 
    
    let options_group = $(this).closest(options_group_elem);
    
    const option_template = `
        <div class="form-group" data-question-count="${question_count}">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="input-group">
                    <input type="text" name="options[${question_count}][]" class="form-control" placeholder="Write your option">
                    <span class="input-group-btn">
                        <button class="btn btn-default add_option" type="button">
                            <i class="icon-plus3"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    `;
    
    $(this).removeClass('add_option');
    $(this).addClass('remove_option');
    $(this).html('<i class="icon-minus3"></i>');


    options_group.append(option_template);

});

// Remove Option
$("#questions_wrapper").delegate('.remove_option', 'click', function(event){

    event.preventDefault();
    
    $(this).closest('.form-group').remove();

});

function getOptionField(event) {
    event.preventDefault();
    
    switch (event.target.value) {
        case 'radio':
            // alert('show add option form-group');
            break;

        case 'checkbox':
            // alert('show add option form-group');
            break;
            
        default:
            // if ($(event.target).closest('.question').next().hasClass('options-group')){
            //     alert('has and we will remove');
            // }else{
            //     alert('No need to add any option');
            // }
            break;
    }

}
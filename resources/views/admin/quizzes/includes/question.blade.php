<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Question</h4>
    </div>
        <div class="card-body">
        <form id="question_form" action="{{ route('admin.quizzes.add.question') }}" method="POST" role="form">
            @csrf
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <input type="hidden" name="question_id">
            <div class="form-group row align-items-center">
                <label for="title" class="form-control-label col-sm-3 text-md-right">Question</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control" 
                        id="title" 
                        placeholder="Enter question title" 
                        value="{{ old('title') }}"
                    />
                    
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="description" class="form-control-label col-sm-3 text-md-right">Description</label>
                <div class="col-sm-6 col-md-9">
                    <textarea class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="duration" class="form-control-label col-sm-3 text-md-right">Duration (in Seconds)</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="number"
                        class="form-control" 
                        name="duration" 
                        id="duration" 
                        placeholder="Enter question duration (timeout)" 
                        value="{{ old('duration') }}"
                    />
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="question_type_id" class="form-control-label col-sm-3 text-md-right">Type of Question <span class="m-l-5 text-danger"> *</span></label>
                <div class="col-sm-6 col-md-9">
                    <select id="question_type_id" class="form-control custom-select @error('question_type_id') is-invalid @enderror" name="question_type_id">
                        <option value="0" selected>Select a question type</option>
                        @foreach($questionTypeList as $type)
                            @if ($quiz->question_type_id == $type->id)
                                <option value="{{ $type->id }}" selected> {{ $type->name }} </option>
                            @else
                                <option value="{{ $type->id }}"> {{ $type->name }} </option>
                            @endif
                        @endforeach
                    </select>
                    @error('question_type_id') {{ $message }} @enderror
                </div>
            </div>
            
            <div class="form-group row align-items-center isTrueCheckbox" hidden>
                <label for="is_true" class="form-control-label col-sm-3 text-md-right">Set Answer to True</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="checkbox" 
                        name="is_true" 
                        id="is_true"
                        style="width:20px;height:20px;"
                        {{ old('is_true') == "on" ? "checked" : "" }}
                    />
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary mr-2" type="submit" id="saving-btn">Add Question</button>
            <a class="btn btn-primary" id="update-btn" href="{{ route('admin.quizzes.update.question') }}" id="update-btn"hidden>Update Question</a>
            <a class="btn btn-outline-secondary" href="{{ route('admin.quizzes.index') }}" id="cancel-btn"><i class="fas fa-trash mr-2"></i>Cancel</a>
            <button class="btn btn-outline-secondary" id="reset-btn" hidden>Reset</button>
        </div>
    </form>
</div>

<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Question List</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2">
                @if(count($questionList) > 0)
                    <div class="card">
                        <div class="card-header">
                            <h4>Jump To</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                @foreach($questionList as $question)
                                    <li class="nav-item text-center">
                                        <a href="#question{{ $loop->iteration }}" class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }} questionList" data-toggle="tab">
                                            {{ $loop->iteration }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-10">
                <div class="tab-content">
                    @foreach($questionList as $question)
                    <div class="tab-pane {{ $loop->iteration == 1 ? 'active' : '' }}" id="question{{ $loop->iteration }}">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Question Number: {{ $loop->iteration }}</h4>
                                <div class="card-header-action">
                                    <a class="{{ $question->question_type_id == 1 ? 'btn btn-info' : ( $question->question_type_id == 2 ? 'btn btn-success' : 'btn btn-info') }}">{{ $question->questionType->name }}</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon edit-question" id="{{ $question->id }}" data-quizid="{{ $quiz->id }}" data-title="{{ $question->title }}" data-description="{{ $question->description }}" data-correct="{{ $question->is_true }}" data-duration="{{ $question->duration }}" data-type="{{ $question->question_type_id }}"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>{{ $question->title }}</h5>
                                <muted>{{ $question->description }}</p>
                            </div>
                        </div>
                        
                        <div class="card-content-option">
                            @if($question->question_type_id == 3)
                                <div class="card">
                                    <div class="card-header justify-content-between">
                                        <h4 class="{{ $question->is_true == 1 ? 'text-success' : 'text-danger' }}">{{ $question->is_true == 1 ? 'True' : 'False' }}</h4>
                                        <div class="card-header-action">
                                            <a class="btn btn-icon btn-dark mx-2" href="#"><i class="fas fa-pencil-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @foreach($question->questionOptions as $option)
                                <div class="card">
                                    <div class="card-header justify-content-between">
                                        <div class="row">
                                            <h4 class="text-muted">Option {{ $loop->iteration }}: <h4>{{ $option->title }}</h4></h4>
                                            @if($option->is_correct == 1)
                                                <a class="btn btn-icon btn-success mx-2" href="#"><i class="fas fa-check"></i></a>
                                            @endif
                                        </div>
                                        <div class="card-header-action row">
                                            @if($option->description != '')
                                                <a data-collapse="#mycard-collapse-{{ $option->id }}" class="btn btn-icon btn-info mx-2" href="#"><i class="fas fa-plus"></i></a>
                                            @endif
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown" class="btn btn-dark dropdown-toggle">Modify</a>
                                                <div class="dropdown-menu">
                                                    <a id="{{ $option->id }}" data-title="{{ $option->title }}" data-description="{{ $option->description }}" data-correct="{{ $option->is_correct }}" class="dropdown-item has-icon editOption"><i class="far fa-edit"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('admin.quizzes.delete.option', $option->id) }}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse" id="mycard-collapse-{{ $option->id }}">
                                        <div class="card-body">
                                            {{ $option->description }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($question->question_type_id == 1)
                            <div class="text-center">
                                <a id="{{ $question->id }}" class="btn btn-icon btn-round btn-primary addOption"><i class="fas fa-plus"></i>  {{ count($question->questionOptions) > 0 ? 'Add another option' : 'Add an option' }}</a>
                            </div>
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // On change dropdown value of attribute
    $("#question_type_id").change(function () {
        var selectedAttribute = this.value;
        console.log(selectedAttribute);
        if(selectedAttribute == 3){
            $('div.isTrueCheckbox').attr('hidden', false);
        } else {
            $('div.isTrueCheckbox').attr('hidden', true);
        }
    });

    // On click Add Option/Add Another Option Button
    $(document).on("click", ".addOption", function() {
        $('div.new-option').attr('hidden', true);
        $('div.edit-option').attr('hidden', true);
        var id = $(this).attr("id");
        $view = '<div class="card new-option">' +
                '   <div class="card-header justify-content-between">' +
                '       <h4 class"text-primary">New Option</h4>' +
                '   </div>' +
                '   <form action="' + "{{ route('admin.quizzes.add.option') }}" + '" method="POST" role="form">' +
                '       @csrf <div class="card-body">' +
                '           <input type="hidden" name="question_id" value="' + id + '">' +
                '           <div class="form-group row align-items-center">' +
                '               <label for="title" class="form-control-label col-sm-3 text-md-right">Option</label>' +
                '               <div class="col-sm-6 col-md-9">' +
                '                   <input type="text" name="title" class="form-control @error('title') {{ $message }} @enderror" id="title" placeholder="Enter option title" value="{{ old("title") }}"/>' +
                '                   <div class="invalid-feedback active">' +
                '                       <i class="fa fa-exclamation-circle fa-fw"></i> @error('title') <span>{{ $message }}</span> @enderror' +
                '                   </div>' +
                '               </div>' +
                '           </div>' +
                '           <div class="form-group row align-items-center">' +
                '               <label for="description" class="form-control-label col-sm-3 text-md-right">Description</label>' +
                '               <div class="col-sm-6 col-md-9">' +
                '                   <textarea class="form-control" rows="4" name="description" id="description">{{ old("description") }}</textarea>' +
                '               </div>' +
                '           </div>' +
                '           <div class="form-group row align-items-center">' +
                '               <label for="is_correct" class="form-control-label col-sm-3 text-md-right">Correct Answer</label>' +
                '               <div class="col-sm-6 col-md-9">' +
                '                   <input type="checkbox" name="is_correct" id="is_correct" style="width:20px;height:20px;" {{ old("is_correct") == "on" ? "checked" : "" }} />' +
                '               </div>' +
                '           </div>' +
                '       </div>' +
                '       <div class="card-footer bg-whitesmoke text-md-right">' +
                '           <button class="btn btn-primary mr-2" type="submit" id="save-option-btn">Add Option</button>' +
                '           <a class="btn btn-outline-secondary" id="cancel-add-option"><i class="fas fa-trash mr-2"></i>Cancel</a>' +
                '       </div>' +
                '   </form>' +
                '</div>';
        $(".card-content-option").append($view);
    });

    // On click Edit Option Button
    $(document).on("click", ".editOption", function() {
        $('div.edit-option').attr('hidden', true);
        var id = $(this).attr("id");
        var titleOption = $(this).data('title');
        var description = $(this).data('description');
        var is_correct = "";
        if($(this).data('correct') == 1){
            is_correct = "checked"
        }
        console.log(id + " " + titleOption + " " + description + " " + is_correct);

        $view = '<div class="card edit-option">' +
                '   <div class="card-header justify-content-between">' +
                '       <h4 class"text-primary">Edit Option</h4>' +
                '   </div>' +
                '   <form action="' + "{{ route('admin.quizzes.update.option') }}" + '" method="POST" role="form">' +
                '       @csrf <div class="card-body">' +
                '           <input type="hidden" name="question_option_id" value="' + id + '">' +
                '           <div class="form-group row align-items-center">' +
                '               <label for="titleOption" class="form-control-label col-sm-3 text-md-right">Option</label>' +
                '               <div class="col-sm-6 col-md-9">' +
                '                   <input type="text" name="titleOption" class="form-control @error('titleOption') {{ $message }} @enderror" id="titleOption" placeholder="Enter option titleOption" value="' + titleOption + '"/>' +
                '                   <div class="invalid-feedback active">' +
                '                       <i class="fa fa-exclamation-circle fa-fw"></i> @error('titleOption') <span>{{ $message }}</span> @enderror' +
                '                   </div>' +
                '               </div>' +
                '           </div>' +
                '           <div class="form-group row align-items-center">' +
                '               <label for="description" class="form-control-label col-sm-3 text-md-right">Description</label>' +
                '               <div class="col-sm-6 col-md-9">' +
                '                   <textarea class="form-control" rows="4" name="description" id="description">' + description + '</textarea>' +
                '               </div>' +
                '           </div>' +
                '           <div class="form-group row align-items-center">' +
                '               <label for="is_correct" class="form-control-label col-sm-3 text-md-right">Correct Answer</label>' +
                '               <div class="col-sm-6 col-md-9">' +
                '                   <input type="checkbox" name="is_correct" id="is_correct" style="width:20px;height:20px;" ' + is_correct +
                '               </div>' +
                '           </div>' +
                '       </div>' +
                '       <div class="card-footer bg-whitesmoke text-md-right">' +
                '           <button class="btn btn-primary mr-2" type="submit" id="edit-option-btn">Edit Option</button>' +
                '           <a class="btn btn-outline-secondary" id="cancel-edit-option"><i class="fas fa-trash mr-2"></i>Cancel</a>' +
                '       </div>' +
                '   </form>' +
                '</div>';
        $(".card-content-option").append($view);
    });

    // On click submit new nption
    $(document).on("click", "#save-option-btn", function() {

    });

    // On click cancel new option
    $(document).on("click", "#cancel-add-option", function() {
        $('div.new-option').attr('hidden', true);
    });

    // On click cancel edit option
    $(document).on("click", "#cancel-add-option", function() {
        $('div.edit-option').attr('hidden', true);
    });

    // On click cancel new option
    $(document).on("click", "#edit-add-option", function() {
        $('div.edit-option').attr('hidden', true);
    });

    // On click question number list option
    $(document).on("click", ".questionList", function() {
        $('div.new-option').attr('hidden', true);
        $('div.edit-option').attr('hidden', true);
    });

    // On click edit question
    $(document).on("click", ".edit-question", function() {
        // Show Reset and Update button
        $('#reset-btn').removeAttr('hidden');
        $('#saving-btn').val('Update Question');

        console.log($('#question_form').attr('action'));
        // Reset Form action to update question route
        $('#question_form').attr("action","{{ route('admin.quizzes.update.question') }}");
        console.log($('#question_form').attr('action'));
        // Hide Save button
        // $('#saving-btn').val("Add Question");
        $('#cancel-btn').attr('hidden', true);

        var id = $(this).attr("id");
        var quiz_id = $(this).data("quizid");
        var title = $(this).data("title");
        var description = $(this).data("description");
        var correct = $(this).data("correct");
        var type = $(this).data("type");
        var duration = $(this).data("duration");
        console.log('id title description correct duration type', id + " " + title + " " + description + " " + correct + " " + duration + " " + type + " " + quiz_id);
        $('input[name=quiz_id]').val(quiz_id).attr('type', 'hidden');
        $('input[name=question_id]').val(id).attr('type', 'hidden');
        $('input[name=title]').val(title);
        $('input[name=description]').val(description);
        $('input[name=duration]').val(duration);
        $('#question_type_id').val(type);
        if(type == 3){
            $('div.isTrueCheckbox').attr('hidden', false);
        } else {
            $('div.isTrueCheckbox').attr('hidden', true);
        }
        if(correct){
            $('input[name=is_true]').prop("checked", true);
        } else {
            $('input[name=is_true]').prop("checked", false);
        }
    });

    // On Click Reset Button
    $(document).on("click", "#reset-btn", function() {
        // Hide Update and Reset Btn
        $('#reset-btn').attr('hidden', true);
        $('#update-btn').attr('hidden', true);
        $('#saving-btn').attr('hidden', false);
        $('#cancel-btn').attr('hidden', false); 

        // Reset Form action to add route
        $('#question_form').action = "{{ route('admin.quizzes.add.question') }}";
        $('#saving-btn').val("Add Question");

        $('input[name=title]').val('');
        $('input[name=description]').val('');
        $('input[name=duration]').val('');
        $('#question_type_id').val(0);
        $('input[name=is_true]').prop("checked", false);
        $('div.isTrueCheckbox').attr('hidden', true);
    });
</script>
@endpush
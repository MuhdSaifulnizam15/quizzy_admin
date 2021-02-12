<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Question List</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Jump To</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            @foreach($questionList as $question)
                                <li class="nav-item text-center">
                                    <a href="#question{{ $loop->iteration }}" class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}" data-toggle="tab">
                                        {{ $loop->iteration }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
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
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
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
                                    <div class="card-header-action">
                                        @if($option->description != '')
                                            <a data-collapse="#mycard-collapse-{{ $option->id }}" class="btn btn-icon btn-warning" href="#"><i class="fas fa-plus"></i></a>
                                        @endif
                                        <a class="btn btn-icon btn-dark mx-2" href="#"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                </div>
                                <div class="collapse" id="mycard-collapse-{{ $option->id }}">
                                    <div class="card-body">
                                        {{ $option->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if($question->question_type_id == 1)
                            <div class="text-center">
                                <a class="btn btn-icon btn-round btn-primary" href="#"><i class="fas fa-plus"></i>  Add another option</a>
                            </div>
                        @endif

                    </div>
                    @endforeach

                    <!-- <div class="tab-pane" id="question2">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Question Type: Multiple Choice Question</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>What is Chemistry</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 1: A Subject</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-1" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-1">
                                <div class="card-body">
                                    Chemistry is a subject
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-3" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-3">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-4" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-4">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-2" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-2">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="question3">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Question Type: Multiple Choice Question</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>What is Chemistry</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 1: A Subject</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-1" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-1">
                                <div class="card-body">
                                    Chemistry is a subject
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-3" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-3">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-4" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-4">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-2" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-2">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="question4">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Question Type: Multiple Choice Question</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>What is Chemistry</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 1: A Subject</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-1" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-1">
                                <div class="card-body">
                                    Chemistry is a subject
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-3" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-3">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-4" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-4">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-2" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-2">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="question5">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Question Type: Multiple Choice Question</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>What is Chemistry</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 1: A Subject</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-1" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-1">
                                <div class="card-body">
                                    Chemistry is a subject
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-3" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-3">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-4" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-4">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-2" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-2">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="question6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Question Type: Multiple Choice Question</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>What is Chemistry</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 1: A Subject</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-1" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-1">
                                <div class="card-body">
                                    Chemistry is a subject
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-3" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-3">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-4" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-4">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Option 2: Chemistry is about life</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse-2" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="collapse" id="mycard-collapse-2">
                                <div class="card-body">
                                    Chemistry is not about life. Its about thing.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="question7">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Question Type: Multiple Choice Question</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>What is Chemistry</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <!-- <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Quiz' : 'Add Quiz' }}</button> -->
        <a class="btn btn-outline-secondary" href="{{ route('admin.quizzes.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
</div>
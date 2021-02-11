<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Add Question</h4>
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
                            <li class="nav-item text-center"><a href="#" class="nav-link active" data-toggle="tab">1</a></li>
                            <li class="nav-item text-center"><a href="#" class="nav-link" data-toggle="tab">2</a></li>
                            <li class="nav-item text-center"><a href="#" class="nav-link" data-toggle="tab">3</a></li>
                            <li class="nav-item text-center"><a href="#" class="nav-link" data-toggle="tab">4</a></li>
                            <li class="nav-item text-center"><a href="#" class="nav-link" data-toggle="tab">5</a></li>
                            <li class="nav-item text-center"><a href="#" class="nav-link" data-toggle="tab">6</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Question Title</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
                        <div class="card-body">
                            You can show or hide this card.
                        </div>
                        <div class="card-footer">
                            Card Footer
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Question Title</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
                        <div class="card-body">
                            You can show or hide this card.
                        </div>
                        <div class="card-footer">
                            Card Footer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <!-- <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Quiz' : 'Add Quiz' }}</button> -->
        <a class="btn btn-outline-secondary" href="{{ route('admin.quizzes.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
</div>
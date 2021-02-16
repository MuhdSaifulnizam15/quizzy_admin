<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Quiz Information</h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Quiz Name <span class="m-l-5 text-danger"> *</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $edit ? old('name', $quiz->name) : old('name') }}">
            <div class="invalid-feedback">
                @error('name') {{ $message }} @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="description">Quiz Description <span class="m-l-5 text-danger"> *</span></label>
            <textarea class="form-control" rows="4" name="description" id="description">{{ $edit ? old('name', $quiz->description) : old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="subject">Subject Name <span class="m-l-5 text-danger"> *</span></label>
            <select id=subject class="form-control custom-select mt-15 @error('subject_id') is-invalid @enderror" name="subject_id">
                <option value="0">Select a subject</option>
                @foreach($subjects as $subject)
                    @if($edit && $subject->id == $quiz->id)
                    <option value="{{ $subject->id }}" selected> {{ $subject->name . ' - ' . $subject->code }} </option>
                    @endif
                    <option value="{{ $subject->id }}"> {{ $subject->name . ' - ' . $subject->code }} </option>
                @endforeach
            </select>
            @error('subject_id') {{ $message }} @enderror
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Quiz' : 'Add Quiz' }}</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.quizzes.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
</div>
@extends('layouts.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $pageTitle }}</h1>
    </div>
    
    @include('partials.flash')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $subTitle }}</h4>
                    </div>
                    <form action="{{ $edit ? route('admin.assignments.update', $assignment->id) : route('admin.assignments.store') }}" method="POST" role="form">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $edit ? old('title', $assignment->title) : old('title') }}">
                                <div class="invalid-feedback">
                                    @error('title') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dateline">Dateline <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control datetimepicker @error('dateline') is-invalid @enderror" name="dateline" id="dateline" value="{{ $edit ? old('dateline', $assignment->dateline) : old('dateline') }}">
                                <div class="invalid-feedback">
                                    @error('dateline') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject Name <span class="m-l-5 text-danger"> *</span></label>
                                <select id=subject class="form-control custom-select mt-15 @error('subject_id') is-invalid @enderror" name="subject_id">
                                    <option value="0">Select a subject</option>
                                    @foreach($subjects as $subject)
                                        @if($edit && $subject->id == $assignment->subject_id)
                                        <option value="{{ $subject->id }}" selected> {{ $subject->name . ' - ' . $subject->code }} </option>
                                        @else
                                        <option value="{{ $subject->id }}"> {{ $subject->name . ' - ' . $subject->code }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('subject_id') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <label for="tutor">Quiz Name <span class="m-l-5 text-danger"> *</span></label>
                                <select id=tutor class="form-control custom-select mt-15 @error('classroom_id') is-invalid @enderror" name="classroom_id">
                                    <option value="0">Select classroom</option>
                                    @foreach($classrooms as $classroom)
                                        @if($edit && $classroom->id == $assignment->classroom_id)
                                        <option value="{{ $classroom->id }}" selected> {{ $classroom->name }} </option>
                                        @else
                                        <option value="{{ $classroom->id }}"> {{ $classroom->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('classroom_id') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <label for="quiz">Quiz Name <span class="m-l-5 text-danger"> *</span></label>
                                <select id=quiz class="form-control custom-select mt-15 @error('quiz_id') is-invalid @enderror" name="quiz_id">
                                    <option value="0">Select quiz</option>
                                    @foreach($quizzes as $quiz)
                                        @if($edit && $quiz->id == $assignment->quiz_id)
                                        <option value="{{ $quiz->id }}" selected> {{ $quiz->name }} </option>
                                        @else
                                        <option value="{{ $quiz->id }}"> {{ $quiz->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('quiz_id') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <label for="priority">Priority </label>
                                <select id=priority class="form-control custom-select mt-15 @error('priority') is-invalid @enderror" name="priority">
                                    <option value="0">None</option>
                                    @php $priorities = ['1' => 'Low', '2' => 'Normal', '3' => 'High']; @endphp
                                    @foreach($priorities as $key => $label)
                                        @if($edit && $key == $assignment->priority)
                                        <option value="{{ $key }}" selected> {{ $label }} </option>
                                        @endif
                                        <option value="{{ $key }}"> {{ $label }} </option>
                                    @endforeach
                                </select>
                                @error('priority') {{ $message }} @enderror
                            </div>

                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Assignment' : 'Add Assignment' }}</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.assignments.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
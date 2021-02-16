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
                    <form action="{{ $edit ? route('admin.classrooms.update', $classroom->id) : route('admin.classrooms.store') }}" method="POST" role="form">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Class Name <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $edit ? old('name', $classroom->name) : old('name') }}">
                                <div class="invalid-feedback">
                                    @error('name') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject Name <span class="m-l-5 text-danger"> *</span></label>
                                <select id=subject class="form-control custom-select mt-15 @error('subject_id') is-invalid @enderror" name="subject_id">
                                    <option value="0">Select a subject</option>
                                    @foreach($subjects as $subject)
                                        @if($edit && $subject->id == $classroom->subject_id)
                                        <option value="{{ $subject->id }}" selected> {{ $subject->name . ' - ' . $subject->code }} </option>
                                        @endif
                                        <option value="{{ $subject->id }}"> {{ $subject->name . ' - ' . $subject->code }} </option>
                                    @endforeach
                                </select>
                                @error('subject_id') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <label for="tutor">Tutor Name <span class="m-l-5 text-danger"> *</span></label>
                                <select id=tutor class="form-control custom-select mt-15 @error('tutor_id') is-invalid @enderror" name="tutor_id">
                                    <option value="0">Select tutor</option>
                                    @foreach($tutors as $tutor)
                                        @if($edit && $tutor->id == $classroom->tutor_id)
                                        <option value="{{ $tutor->id }}" selected> {{ $tutor->name }} </option>
                                        @endif
                                        <option value="{{ $tutor->id }}"> {{ $tutor->name }} </option>
                                    @endforeach
                                </select>
                                @error('subject_id') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Quiz' : 'Add Quiz' }}</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.classrooms.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
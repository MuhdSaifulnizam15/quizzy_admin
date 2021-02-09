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
                    <form action="{{ $edit ? route('admin.subjects.update', $subject->id) : route('admin.subjects.store') }}" method="POST" role="form">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Subject Name <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $edit ? old('name', $subject->name) : old('name') }}">
                                <div class="invalid-feedback">
                                    @error('name') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="code">Subject Code <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror text-uppercase" name="code" id="code" value="{{ $edit ? old('code', $subject->code) : old('code') }}">
                                <div class="invalid-feedback">
                                    @error('code') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Subject' : 'Add Subject' }}</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.subjects.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
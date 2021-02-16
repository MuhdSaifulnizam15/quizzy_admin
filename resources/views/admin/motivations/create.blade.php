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
                    <form action="{{ $edit ? route('admin.motivations.update', $motivation->id) : route('admin.motivations.store') }}" method="POST" role="form">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="quote">Quote <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('quote') is-invalid @enderror" name="quote" id="quote" value="{{ $edit ? old('quote', $motivation->quote) : old('quote') }}">
                                <div class="invalid-feedback">
                                    @error('quote') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author">Author <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ $edit ? old('author', $motivation->author) : old('author') }}">
                                <div class="invalid-feedback">
                                    @error('author') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit Quote' : 'Add Quote' }}</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.motivations.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
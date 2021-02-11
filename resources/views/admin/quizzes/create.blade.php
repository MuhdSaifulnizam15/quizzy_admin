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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Jump To</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="#info" class="nav-link active" data-toggle="tab">Quiz Information</a></li>
                            <li class="nav-item"><a href="#question" class="nav-link" data-toggle="tab">Question</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        <form action="{{ $edit ? route('admin.quizzes.update', $quiz->id) : route('admin.quizzes.store') }}" method="POST" role="form">
                        @csrf
                        @include('admin.quizzes.includes.info')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
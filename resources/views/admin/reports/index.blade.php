@extends('layouts.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ $pageTitle }}</h1>
    </div>

    @include('partials.flash')

    <div class="section-body">
        <h2 class="section-title text-capitalize">Generate report based on following options</h2>

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="far fa-file-word"></i>
                    </div>
                    <div class="card-body">
                        <h4>Quiz</h4>
                        <p>Overall quiz performance based on individual or question</p>
                        <a href="{{ route('admin.reports.quiz') }}" class="card-cta">Generate <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <div class="card-body">
                        <h4>Assignments</h4>
                        <p>Overall insights based on assignments</p>
                        <a href="{{ route('admin.reports.assignment') }}" class="card-cta">Generate <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-body">
                        <h4>Tutor</h4>
                        <p>Overall reports based on tutor</p>
                        <a href="{{ route('admin.reports.tutor') }}" class="card-cta">Generate <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-body">
                        <h4>Classroom</h4>
                        <p>Overall reports based on the classroom</p>
                        <a href="{{ route('admin.reports.class') }}" class="card-cta">Generate <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('additional_js')
<script type="text/javascript">
</script>
@endsection

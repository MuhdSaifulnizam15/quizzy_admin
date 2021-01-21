@extends('layouts.app')

@section('title', 'Daily Dose List')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Daily Dose</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Motivation Quote</h2>
        <p class="section-lead">Random Motivation Quote would be displayed on the app.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h4>Motivation List</h4>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th></th>
                                    <th>Quote</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($motivations as $motivation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $motivation->quote }}</td>
                                    <td>{{ $motivation->author }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary m-1">Edit</a>
                                        <a href="#" class="btn btn-outline-danger m-1">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                                </ul>
                            </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

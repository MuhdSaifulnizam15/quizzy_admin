@extends('layouts.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ $pageTitle }}</h1>
    </div>

    @include('partials.flash')

    <div class="section-body">
        <!-- <h2 class="section-title">List of Motivation Quote</h2>
        <p class="section-lead">Random Motivation Quote would be displayed on the app.</p> -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>{{ $subTitle }}</h4>
                        <a href="{{ route('admin.motivations.create') }}" class="btn btn-outline-primary">Add New Quote</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quote</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('additional_js')
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.motivations.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'quote', name: 'quote'},
                { data: 'author', name: 'author'},
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
     });
</script>
@endsection

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
                            <table class="table table-bordered table-md data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quote</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!-- @foreach($motivations as $motivation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $motivation->quote }}</td>
                                    <td>{{ $motivation->author }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary m-1">Edit</a>
                                        <a href="#" class="btn btn-outline-danger m-1">Delete</a>
                                    </td>
                                </tr>
                                @endforeach -->
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
            ajax: "{{ route('motivations.index') }}",
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

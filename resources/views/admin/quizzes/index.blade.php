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
                    <div class="card-header justify-content-between">
                        <h4>{{ $subTitle }}</h4>
                        <a href="{{ route('admin.quizzes.create') }}" class="btn btn-outline-primary">Create Quiz</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md data-table-quiz">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quiz Name</th>
                                        <th>Quiz Description</th>
                                        <th>Subject</th>
                                        <th>Updated At</th>
                                        <th>Status</th>
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
        var table = $('.data-table-quiz').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.quizzes.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name'},
                { data: 'description', name: 'description', orderable: false, searchable: false},
                { data: 'subject_name', name: 'subject_name', className: 'text-center',},
                { 
                    data: 'updated_at', 
                    className: 'text-center',
                    render: function(data) {
                        return moment(data).format('DD MMM YYYY h:mm A')
                    }
                },
                { 
                    data: 'is_active', 
                    className: 'text-center',
                    render: function(data) {
                        if(data == 1) {
                            return '<span class="badge badge-success">Active</span>'
                        } else {
                            return '<span class="badge badge-danger">Not Active</span>'
                        }
                    }
                },
                { data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false},
            ]
        });
     });
</script>
@endsection

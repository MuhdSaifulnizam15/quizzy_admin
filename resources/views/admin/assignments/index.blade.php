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
                        <a href="{{ route('admin.assignments.create') }}" class="btn btn-outline-primary">Add Assignment</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md data-table-assignment">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Quiz Name</th>
                                        <th>Date Created</th>
                                        <th>Dateline</th>
                                        <th>Priority</th>
                                        <th></th>
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
        var table = $('.data-table-assignment').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.assignments.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'title', name: 'title'},
                { data: 'class_name', name: 'class_name'},
                { data: 'subject_name', name: 'subject_name'},
                { data: 'quiz_name', name: 'quiz_name'},
                { 
                    data: 'created_at', 
                    className: 'text-center',
                    render: function(data) {
                        return moment(data).format('DD MMM YYYY h:mm A')
                    }
                },
                { 
                    data: 'dateline', 
                    className: 'text-center',
                    render: function(data) {
                        return moment(data).format('DD MMM YYYY h:mm A')
                    }
                },
                { 
                    data: 'priority', 
                    className: 'text-center',
                    render: function(data) {
                        if(data == 0) {
                            return '<span class="badge badge-primary">None</span>'
                        } else if(data == 1) {
                            return '<span class="badge badge-success">Low</span>'
                        } else if(data == 2) {
                            return '<span class="badge badge-warning">Normal</span>'
                        } else {
                            return '<span class="badge badge-danger">High</span>'
                        }
                    }
                },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
     });
</script>
@endsection

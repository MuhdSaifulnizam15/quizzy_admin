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
                        <a href="{{ route('admin.classrooms.create') }}" class="btn btn-outline-primary">Create Class</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md data-table-classroom">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Tutor Name</th>
                                        <th>Created At</th>
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
        var table = $('.data-table-classroom').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.classrooms.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name'},
                { data: 'subject_name', name: 'subject_name', className: 'text-center',},
                { data: 'subject_code', name: 'subject_code', className: 'text-center',},
                { data: 'tutor_name', name: 'tutor_name', className: 'text-center',},
                { 
                    data: 'created_at', 
                    className: 'text-center',
                    render: function(data) {
                        return moment(data).format('DD MMM YYYY h:mm A')
                    }
                },
                { data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false},
            ]
        });
     });
</script>
@endsection

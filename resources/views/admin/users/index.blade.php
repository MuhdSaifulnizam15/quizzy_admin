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
                        <!-- <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary">Add User</a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md data-table-user">
                                <thead>
                                    <tr>
                                      <th></th>
                                      <th>Full Name</th>
                                      <th>Email</th>
                                      <th>Roles</th>
                                      <th>Date Created</th>
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
        var table = $('.data-table-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.users.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email'},
                { data: 'roles', name: 'roles', className: 'text-center',},
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
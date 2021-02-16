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
                        <!-- <a href="{{ route('admin.classrooms.add.student', [Request::segment(3)]) }}" class="btn btn-outline-primary">Add Student</a> -->
                        <a class="btn btn-outline-primary" data-toggle="modal" data-target="#addStudentModal">Add Student</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md data-table-classroom-user">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Student Email</th>
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

@section('modal')
<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.classrooms.add.student', [Request::segment(3)]) }}" method="POST" role="form">
                <div class="modal-body">
                    @csrf
                    <div class="form-group row align-items-center p-2">
                        <label for="students">Select Student <span class="m-l-5 text-danger"> *</span></label>
                        <div class="input-group">
                            <select name="students[]" id="students" class="form-control select2" style="width: 100%;" multiple>
                                <option value="0">Select student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}"> {{ $student->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary addStudent">Add Selected Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('additional_js')
<script type="text/javascript">
    $(function() {
        var table = $('.data-table-classroom-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.classrooms.detail', [Request::segment(3)]) }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email'},
                { data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false},
            ]
        });
     });
</script>
@endsection

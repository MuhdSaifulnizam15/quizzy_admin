@extends('layouts.app')

@section('title', 'Users List')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Users</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Users</h2>
        
        <div class="row">
          <div class="col-12">
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
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
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles()->pluck('name')->implode(' ')}}</td>
                        <td>{{ date('d M Y', strtotime($user->created_at)) }}</td>
                        <td>
                            <a href="#" class="btn btn-outline-primary m-1">Edit</a>
                            <a href="#" class="btn btn-outline-danger m-1">Delete</a>
                        </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
  </section>
@endsection
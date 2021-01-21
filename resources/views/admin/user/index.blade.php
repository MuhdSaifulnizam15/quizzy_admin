@extends('layouts.app')

@section('title', 'Users List')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>List of Users</h1>
    </div>

    <div class="section-body">

        <div class="row">
          <div class="col-sm-12">
              <h1 class="display-3">Contacts</h1>    
            <table class="table table-striped">
              <thead>
                  <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          <div>
          </div>
    </div>
  </section>
@endsection

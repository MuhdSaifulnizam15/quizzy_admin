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
                    <div class="card-header">
                        <h4>{{ $subTitle }}</h4>
                    </div>
                    <form action="{{ $edit ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST" role="form">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Full Name <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $edit ? old('name', $user->name) : old('name') }}">
                                <div class="invalid-feedback">
                                    @error('name') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $edit ? old('email', $user->email) : old('email') }}">
                                <div class="invalid-feedback">
                                    @error('email') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role">Role <span class="m-l-5 text-danger"> *</span></label>
                                <select id=role class="form-control custom-select mt-15 @error('role_name') is-invalid @enderror" name="role_name">
                                    <option value="">Select a role</option>
                                    @foreach($roles as $role)
                                        @if($edit && $role->name == $user_role)
                                        <option value="{{ $role->name }}" selected> {{ $role->name }} </option>
                                        @endif
                                        <option value="{{ $role->name }}"> {{ $role->name }} </option>
                                    @endforeach
                                </select>
                                @error('role_name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">{{ $edit ? 'Edit User' : 'Add User' }}</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
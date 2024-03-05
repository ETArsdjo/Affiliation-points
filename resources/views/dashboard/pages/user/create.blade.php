@extends('dashboard.layouts.master')
@section('title', 'Create User')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create User </h5>
                <form action="{{ route('user-admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </div>
                        @error('name')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" />
                        </div>
                        @error('email')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone" />
                        </div>
                        @error('phone')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                        @error('password')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="male" class="form-label">Male</label>
                            <input type="radio" id="male" name="gender" value="male" />
                        </div>
                        <div class="mb-3">
                            <label for="female" class="form-label">Female</label>
                            <input type="radio" id="female" name="gender" value="female" />
                        </div>
                        @error('gender')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="volunteer">Volunteer</option>
                                <option value="user" >User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        @error('role')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection

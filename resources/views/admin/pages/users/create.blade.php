@extends('admin.layouts.master')
@section('title', 'Add Admin')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create User</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user_admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px" src="{{ url('no-admin-image.png') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">User Name</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">User Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">User Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="password" class="form-control" name="password"
                                            value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">User Phone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="phone" class="form-control" name="phone"
                                            value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-5">
                                    <label for="male" class="text-dark font-weight-medium">Male</label>
                                    <input type="radio" id="male" name="gender" value="male" />
                                </div>
                                <div class="mb-5">
                                    <label for="female" class="text-dark font-weight-medium">Female</label>
                                    <input type="radio" id="female" name="gender" value="female" />
                                </div>
    
                            </div>
        
                            <div class="card-body">
                                <div class="mb-5">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role">
                                        <option value="manager">Manager</option>
                                        <option value="user" >User</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                               
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                            </div>
                        </div>
                    </form>
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

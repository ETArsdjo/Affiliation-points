@extends('admin.layouts.master')
@section('title', 'Edit Employee')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Employee : {{$employee->user->name}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee_admin.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Other form fields -->
                        <div class="mb-5">
                            <label class="text-dark font-weight-medium">Employee Name</label>
                            <select class="form-select" id="employee_id" aria-label="employee_id" name="employee_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $employee->user->id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="text-dark font-weight-medium">Employee Name</label>
                            <select class="form-select" id="branch_id" aria-label="branch_id" name="branch_id">
                                @foreach ($branches as $branche)
                                <option value="{{ $branche->id }}" {{ optional($employee->branche)->id == $branche->id ? 'selected' : '' }}>
                                    {{ $branche->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Other form fields -->
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
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

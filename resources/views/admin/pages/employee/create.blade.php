@extends('admin.layouts.master')
@section('title', 'Add Employee')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Employee</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee_admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Branch Name</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="branch_id" aria-label="branch" name="branch_id">
                                            @foreach ($branches as $branche)
                                                <option value="{{ $branche->id }}">{{ $branche->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Employee Name</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" id="employee_id" aria-label="branch" name="employee_id">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

@extends('admin.layouts.master')
@section('title', 'Edit Employee')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Employee</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee_admin.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Employee Name</label>
                                        <select class="form-select" id="kingdom_id" aria-label="kingdom_id" name="kingdom_id">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ $employee->employee_id == $employee_id->id ? 'selected' : '' }}>
                                                    {{ $employee->name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Branch address</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $branch->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Branch number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="number" class="form-control" name="number"
                                            value="{{ $branch->number }}">
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

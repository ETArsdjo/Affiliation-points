@extends('admin.layouts.master')
@section('title', 'Add category')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('category_admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">category type</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="type"
                                            value="{{ old('type') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">category price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                    </div>
                                </div>
                            </div>
                            




                            <div class="row">
                                <div class="col-xl-2">
                                    <div class="mb-5">
                                        <img id="showImage" width="100px" src="{{ url('no-image.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-xl-10">
                                    <div class="mb-5">
                                        <label class="text-dark font-weight-medium" for="">Upload Image</label>
                                        <div class="mb-5">
                                            {{-- <label class="text-dark font-weight-medium">Investment opportunity Name</label> --}}
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text mdi mdi-folder-image" id="mdi-account"></span>
                                                </div>
                                                <input type="file" class="form-control" name="image" id="image">
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">category image</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="file" class="form-control" name="image"
                                            value="{{ old('image') }}">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">category note</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="note"
                                            value="{{ old('note') }}">
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

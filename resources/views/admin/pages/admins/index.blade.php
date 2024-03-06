@extends('admin.layouts.master')
@section('title', 'Admins')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h4>Manage Admins</h4>
                    {{-- <a href="{{ route('admin-users.create') }}" class="mb-1 btn btn-outline-primary"> --}}
                        <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                        Create Admin
                    </a>
                </div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

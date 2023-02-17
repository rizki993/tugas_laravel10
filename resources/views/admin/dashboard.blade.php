@extends('admin.layout')

@section('title', 'Apotek')

@section('style')
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <h1>Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('includes.alert')
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush

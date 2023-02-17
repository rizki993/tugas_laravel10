@extends('admin.layout')

@section('title', 'Apotek')

@section('style')
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <h1>Kategori</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>
        <div class="col-12">
            @include('includes.alert')

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: inline-block;" class="delete-category">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.delete-category').on('submit', function(e) {
            e.preventDefault();
            if (confirm('Are you sure?')) {
                this.submit();
            }
        });
    });
</script>
@endpush

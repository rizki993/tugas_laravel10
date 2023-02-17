@extends('admin.layout')

@section('title', 'Apotek')

@section('style')
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <h1>Users</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah User</a>
        </div>
        <div class="col-12">
            @include('includes.alert')

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;" class="delete-user">
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
        $('.delete-user').on('submit', function(e) {
            e.preventDefault();
            if (confirm('Are you sure?')) {
                this.submit();
            }
        });
    });
</script>
@endpush

@extends('admin.layout')

@section('title', 'Apotek')

@section('style')
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <h1>Obat</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('includes.alert')
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary">Tambah Obat</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama Obat</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $obat)
                            <tr>
                                <td>
                                    <img class="img-thumbnail" src="{{ asset("storage/images/{$obat->image}") }}" alt="">
                                </td>
                                <td>{{ $obat->name }}</td>
                                <td>{{ $obat->category->name }}</td>
                                <td>{{ $obat->price }}</td>
                                <td>{{ $obat->stock }}</td>
                                <td>
                                    <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush

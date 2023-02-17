@extends('admin.layout')

@section('title', 'Apotek')

@section('style')
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <h1>{{ $is_add ? 'Tambah Kategori' : 'Edit Kategori'}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('includes.alert')
            {{-- show flash message --}}

            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="{{ $is_add ? route('admin.category.store') : route('admin.category.update', [$category->id]) }}">
                        @csrf
                        @if(!$is_add)
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputUsername">Nama</label>
                            <input class="form-control py-4" id="inputUsername" name="name" type="text" placeholder="Masukkan nama" value="{{$category->name ?? old('name')}}" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- description --}}
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputDescription">Deskripsi</label>
                            <textarea class="form-control" id="inputDescription" name="description" type="text" placeholder="Masukkan deskripsi">{{$category->description ?? old('description')}}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- submit button --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush

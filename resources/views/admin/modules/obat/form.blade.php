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

            <div class="card mb-4">
                <div class="card-body">
                    <form method="post"
                        action="{{ $is_add ? route('admin.obat.store') : route('admin.obat.update', [$obat->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if(!$is_add)
                        @method('PUT')
                        @endif

                        {{-- category --}}
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputCategory">Kategori</label>
                            <select class="form-control" id="inputCategory" name="category_id">
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == ($obat->category_id ??
                                    old('category_id')) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- name --}}
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputName">Nama</label>
                            <input class="form-control py-4" id="inputName" name="name" type="text"
                                placeholder="Masukkan nama" value="{{$obat->name ?? old('name')}}" />
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- description --}}
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputDescription">Deskripsi</label>
                            <textarea class="form-control" id="inputDescription" name="description" type="text"
                                placeholder="Masukkan deskripsi">{{$obat->description ?? old('description')}}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- price --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-1 font-size-20" for="inputStock">Stok</label>
                                <input class="form-control py-4" id="inputStock" name="stock" type="number"
                                    placeholder="Masukkan stok" value="{{$obat->stock ?? old('stock')}}" />
                                @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 font-size-20" for="inputPrice">Harga</label>
                                <input class="form-control py-4" id="inputPrice" name="price" type="number"
                                    placeholder="Masukkan harga" value="{{$obat->price ?? old('price')}}" />
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        {{-- stock --}}
                        <div class="form-group">

                        </div>

                        {{-- image --}}
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputImage">Gambar</label>
                            <input class="form-control" id="inputImage" name="obat_image" type="file"
                                accept=".jpg,.png,.jpeg" placeholder="Masukkan gambar" />
                            @error('obat_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- submit button --}}
                        <div class="form-group mt-5 mb-2">
                            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
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

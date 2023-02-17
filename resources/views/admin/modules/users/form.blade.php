@extends('admin.layout')

@section('title', 'Apotek')

@section('style')
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <h1>Tambah User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('includes.alert')
            {{-- show flash message --}}

            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="{{ $is_add ? route('admin.users.store') : route('admin.users.update', [$user->id]) }}">
                        @csrf
                        @if(!$is_add)
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputUsername">Nama</label>
                            <input class="form-control py-4" id="inputUsername" name="name" type="text" placeholder="Masukkan nama" value="{{$user->name ?? old('name')}}" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputEmail">Email</label>
                            <input class="form-control py-4" id="inputEmail" name="email" type="text" placeholder="Masukkan email" value="{{$user->email ?? old('email')}}"/>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1 font-size-20" for="inputPassword">Password</label>
                            <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Masukkan password" />
                            @error('password')
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

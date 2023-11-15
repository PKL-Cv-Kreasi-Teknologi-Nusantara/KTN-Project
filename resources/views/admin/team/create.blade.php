@extends('layout.dashboard_admin')
@section('title', 'Tambah Pegawai')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2 card-bg-fill">
            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h1 class="text-primary">Tambah Pegawai</h1>
                </div>
                <div class="p-2 mt-4">
                    <form action="/admin/team" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name"
                                placeholder="Masukan nama lengkap anda" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="Enter E-mail" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password-input">Password</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" class="form-control pe-5 password-input"
                                    placeholder="Enter password" id="password-input" name="password">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary w-100" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
@endsection
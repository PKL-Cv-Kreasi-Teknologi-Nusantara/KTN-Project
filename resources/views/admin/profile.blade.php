@extends('layout.dashboard_admin')
@section('title', 'Ubah Profile')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card mt-2 card-bg-fill">
            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h1 class="text-primary">Profile</h1>
                </div>
                <div class="p-2 mt-4">
                    @if (Auth::user()->role == 'admin')
                    <form action="/profile/{{$user->id}}" method="POST" id="adminForm">
                    @else
                    <form action="/pegawai/profile/{{$user->id}}" method="POST" id="pegawaiForm">
                    @endif
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name"
                                placeholder="Masukan nama lengkap anda" name="name" value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="Enter E-mail" name="email" value="{{$user->email}}">
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary w-100" type="submit" id="submitInfo">Ubah Profile</button>
                        </div>
                        <hr style="border: 10px solid rgb(255, 0, 0);">
                        <h3>Ubah Password</h3>
                        <div class="mb-3">
                            <label class="form-label" for="password-input">Password</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" class="form-control pe-5 password-input"
                                    placeholder="Enter password" id="password-input" name="password">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary w-100" type="submit" id="submitPassword" disabled>Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
<script>
    var passwordInput = document.getElementById('password-input');
    var submitInfoButton = document.getElementById('submitInfo');
    var submitPasswordButton = document.getElementById('submitPassword');
    // Menambahkan event listener pada input password untuk mengaktifkan/menonaktifkan tombol simpan password
    passwordInput.addEventListener('input', function () {
        // Jika password diisi, aktifkan tombol simpan password
        if (passwordInput.value.trim() !== '') {
            submitPasswordButton.removeAttribute('disabled');
            submitInfoButton.setAttribute('disabled','disabled');
        } else {
            // Jika password kosong, nonaktifkan tombol simpan password
            submitPasswordButton.setAttribute('disabled', 'disabled');
            submitInfoButton.removeAttribute('disabled');
        }
    });
</script>
@endsection

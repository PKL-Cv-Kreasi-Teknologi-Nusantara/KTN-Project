@extends('layout.login')
@section('title', 'Lock Screen')
@section('content')
    <div class="auth-page-wrapper pt-5">
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Lock Screen</h5>
                                    <p class="text-muted">Enter your password to unlock the screen!</p>
                                </div>
                                <div class="user-thumb text-center">
                                    <h5 class="font-size-15 mt-3">{{ $user->name }}</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('unlock') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" required>
                                        </div>
                                        <div class="mb-2 mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Unlock</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="mb-0">Not you? Return <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline">Signin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
        @include('layout.costum')
    </div>
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
    <script src="{{ asset('assets/js/pages/particles.app.js') }}"></script>
    <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>
@endsection

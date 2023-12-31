@extends('layout.dashboard_admin')
@section('title', 'Dashboard')
@section('content')
{{-- massage setalah perintah --}}
@if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif
<script>
    // Hapus elemen pesan sukses setelah animasi selesai
    window.onload = function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.addEventListener('animationend', function() {
                successMessage.style.display = 'none';
            });
        }
    }
</script>
<style>
    /* Animasi fade out */
    @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        /* Gaya untuk pesan sukses */
        #success-message {
            animation: fadeOut 2s ease 5s forwards;
        }
</style>
    <div class="row">
        <div class="col-xxl-5">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200"
                                    height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0"
                                        d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Pegawai</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="{{$user}}">0</span></h2>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                <i class="bi bi-person-circle text-primary"></i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200"
                                    height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0"
                                        d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Total Project</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="{{$project}}">0</span></h2>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                <i class="bi bi-code-slash text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200"
                                    height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0"
                                        d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Project Inprogress</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold text-warning"><span class="counter-value"
                                                data-target="{{$inprogress}}">0</span></h2>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                <i class="bi bi-code-slash text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200"
                                    height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0"
                                        d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Project Completed</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold text-success"><span class="counter-value"
                                                data-target="{{$completed}}">0</span></h2>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                                <i class="bi bi-code-slash text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->
            </div>
        </div> <!-- end col-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div> <!-- end row-->
    <!-- apexcharts -->
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Dashboard init -->
    <script src="assets/js/pages/dashboard-analytics.init.js"></script>
@endsection

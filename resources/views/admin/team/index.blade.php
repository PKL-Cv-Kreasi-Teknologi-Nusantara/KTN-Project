@extends('layout.dashboard_admin')
@section('title', 'Team')
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

{{-- end massage --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <a
                href="/admin/team/create"
                id="tambahUser" 
                class="btn btn-primary"
                style="margin-bottom: 10px; padding: 10px 24px; width: 300px; font-size: 15px;">
                Tambah User
            </a>
        </div>
        <div class="col-lg-12">
            <div class="card-body">
                <div id="table-fixed-header">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <a href="/admin/team/{{$user->id}}/edit" class="btn-edit btn-primary btn-sm btn-warning">Edit</a>
                                    <button onclick="modalHapus('{{$user->id}}')" class="btn-delete btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    </div>
    <button onclick="topFunction()" class="btn btn-primary btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script>
        $(document).ready(function() {
            var t = $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                stateSave: true,
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0,
                }, ],
                order: [
                    [1, 'asc']
                ],

            });

            t.on('order.dt search.dt', function() {
                let i = 1;

                t.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });

        function modalHapus(id_user) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Untuk menghapus Surat Jalan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/team/' . $user->id) }}", // Pastikan URL sesuai dengan struktur rute Anda
                    data: {
                            _token: '{{ csrf_token() }}',
                            // id: id_user // Tidak diperlukan karena kita sudah menambahkannya ke URL
                    },
                    success: function (data) {
                        console.log(data)
                        Swal.fire(
                            'Success!',
                            'Berhasil hapus Surat Jalan.',
                            'success',
                            '3000'
                        )
                        location.reload(true);
                    },
                    error: function (error) {
                        Swal.fire(
                            'Error!',
                            'Gagal hapus Surat Jalan.',
                            'error',
                            '3000'
                        )
                    }
                });
            }
        })
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
        /* Gaya untuk sel tabel */
        #myTable {
            width: 100%;
            margin: 0 auto;
        }

        #myTable th {
            padding: 15px;
            text-align: center;
            font-size: 15px;
        }

        #myTable td {
            padding: 10px;
            text-align: center;
            font-size: 15px;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 7px 30px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
            border: 1px solid #dc3545;
            border-radius: 5px;
            padding: 7px 30px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

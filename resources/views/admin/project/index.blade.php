@extends('layout.dashboard_admin')
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="/admin/project/create" id="tambahUser" class="btn btn-primary"
            style="margin-bottom: 10px; padding: 10px 24px; width: 300px; font-size: 15px;">
            Tambah Project
        </a>
    </div>

    <div class="col-lg-12">
        <div class="card-body">
            <div id="table-fixed-header">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Project</th>
                            <th>Client</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $index => $project)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $project->nama_projects }}</td>
                            <td>{{ $project->client }}</td>
                            <td>{{ \Carbon\Carbon::parse($project->deadline)->format('d M, Y') }}</td>
                            <td>
                                <div
                                    class="badge {{ $project->status === 'completed' ? 'bg-success' : 'bg-danger' }} fs-12">
                                    {{ $project->status }}
                                </div>
                            </td>
                            <td>
                                <div
                                    class="badge {{ $project->priority === 'high' ? 'bg-danger' : 'bg-success' }} fs-12">
                                    {{ $project->priority }}
                                </div>
                            </td>
                            <td>
                                <!-- Tombol Detail -->
                                <a href="/admin/project/{{$project->projects_id}}"
                                    class="btn btn-primary btn-sm btn-detail">Detail</a>
                                <!-- Tombol Edit -->
                                <a href="/admin/project/{{$project->projects_id}}/edit"
                                    class="btn-edit btn-primary btn-sm btn-warning">Edit</a>
                                <!-- Tombol Delete -->
                                <button onclick="modalHapus('{{$project->projects_id}}')"
                                    class="btn-delete btn btn-danger">Delete</button>
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
    $(document).ready(function () {
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

        t.on('order.dt search.dt', function () {
            let i = 1;

            t.cells(null, 0, {
                search: 'applied',
                order: 'applied'
            }).every(function (cell) {
                this.data(i++);
            });
        }).draw();
    });

    function modalHapus(id_project) {
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
                    url: "{{ url('/admin/project/')}}/" +
                        id_project, // Pastikan URL sesuai dengan struktur rute Anda
                    data: {
                        _token: '{{ csrf_token() }}',
                        // id: id_user // Tidak diperlukan karena kita sudah menambahkannya ke URL
                    },
                    success: function (data) {
                        console.log(data)
                        Swal.fire(
                            'Success!',
                            'Berhasil hapus Data.',
                            'success',
                            '3000'
                        )
                        location.reload(true);
                    },
                    error: function (error) {
                        Swal.fire(
                            'Error!',
                            'Gagal hapus Data.',
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

    /* Tombol Detail */
    .btn-detail {
        background-color: #27bb33;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 7px 30px;
        font-size: 14px;
        transition: background-color 0.2s ease-in-out;
    }

    .btn-detail:hover {
        background-color: #0165d1;
    }

    /* Tombol Edit */
    .btn-edit {
        background-color: #ffc107;
        color: #000;
        border: none;
        border-radius: 5px;
        padding: 7px 30px;
        font-size: 14px;
        transition: background-color 0.2s ease-in-out;
    }

    .btn-edit:hover {
        background-color: #0165d1;
    }

    /* Tombol Delete */
    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 7px 30px;
        font-size: 14px;
        transition: background-color 0.2s ease-in-out;
    }

    .btn-delete:hover {
        background-color: #0165d1;
    }

</style>
@endsection

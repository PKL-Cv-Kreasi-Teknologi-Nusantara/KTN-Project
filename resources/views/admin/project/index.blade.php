@extends('layout.dashboard_admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <button id="tambahUser" class="btn btn-primary"
                style="margin-bottom: 10px; padding: 10px 0; width: 300px; font-size: 15px;">
                <i class="fas fa-plus"></i> Tambah Project
            </button>
        </div>

        <div class="col-lg-12">
            <div class="card-body">
                <div id="table-fixed-header">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Client</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Dede</td>
                                <td>PT INDONESIA JAYA</td>
                                <td>20 JANUARI 2050</td>
                                <td><span class="badge badge-soft-info">Re-open</span></td>
                                <td><span class="badge bg-danger">High</span></td>
                                <td>
                                    <!-- Tombol Detail -->
                                    <button class="btn btn-primary btn-sm btn-detail" data-toggle="modal"
                                        data-target="#detailModal">
                                        Detail
                                    </button>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal"
                                        data-target="#editModal">
                                        Edit
                                    </button>
                                    <!-- Tombol Delete -->
                                    <button class="btn btn-danger btn-sm btn-delete" data-toggle="modal"
                                        data-target="#deleteModal">
                                        Delete
                                    </button>
                                </td>
                            </tr>
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

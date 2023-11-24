@extends('layout.dashboard_admin')
@section('title', 'Tambah Project')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Project</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                <li class="breadcrumb-item active">Create Project</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Create Project</h5>
                        </div>
                        <div class="card-body">
                            <form action="/admin/project" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_projects" class="form-label mb-3">Nama Project</label>
                                    <input type="text" class="form-control" id="nama_projects"
                                        placeholder="Masukkan nama proyek" name="nama_projects">
                                </div>

                                <div class="mb-3">
                                    <label for="client" class="form-label mb-3">Client</label>
                                    <input type="text" class="form-control" id="client"
                                        placeholder="Masukkan nama proyek" name="client">
                                </div>


                                <div class="mb-3">
                                    <label for=description" class="form-label">Deskripsi Project</label>
                                    <textarea class="form-control" id=description"
                                        placeholder="Masukkan deskripsi proyek" name="description"
                                        style="height: 150px;"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="priority" class="form-label">Prioritas</label>
                                            <select class="form-select" id="priority" name="priority">
                                                <option value="High">Tinggi</option>
                                                <option value="Medium">Sedang</option>
                                                <option value="Low">Rendah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="deadline" class="form-label">Batas Waktu</label>
                                            <input type="date" class="form-control" id="deadline" name="deadline">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="status-input" class="form-label">status</label>
                                    <select class="form-select" id="status-input" name="status">
                                        <option value="In Progress">Dalam Proses</option>
                                        <option value="Completed">Selesai</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</div>
<!-- END layout-wrapper -->

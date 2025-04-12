@extends('template-admin.layout')
@section('title', 'Dashboard Admin')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection
@section('konten')
<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row gy-4"> <!-- Added gy-4 for spacing -->

            <div class="col-sm-4">
                <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <div class="avatar">
                    <div class="avatar-initial bg-success rounded-circle shadow-xs"> <!-- Green background -->
                        <i class="fas fa-user-graduate"></i> <!-- Icon for Siswa -->
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-1">Siswa</h6>
                    <div class="d-flex flex-wrap mb-1 align-items-center">
                    <h4 class="mb-0 me-2">{{ $jumlahSiswa }}</h4>
                    </div>
                    <small>Total siswa yang terdaftar</small>
                </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <div class="avatar">
                    <div class="avatar-initial bg-primary rounded-circle shadow-xs"> <!-- Blue background -->
                        <i class="fas fa-chalkboard-teacher"></i> <!-- Icon for Guru -->
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-1">Guru</h6>
                    <div class="d-flex flex-wrap mb-1 align-items-center">
                    <h4 class="mb-0 me-2">{{ $jumlahGuru }}</h4>
                    </div>
                    <small>Total Guru yang terdaftar</small>
                </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <div class="avatar">
                    <div class="avatar-initial bg-warning rounded-circle shadow-xs"> <!-- Yellow background -->
                        <i class="fas fa-school"></i> <!-- Icon for Kelas -->
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-1">Kelas</h6>
                    <div class="d-flex flex-wrap mb-1 align-items-center">
                    <h4 class="mb-0 me-2">{{ $jumlahLocal }}</h4>
                    </div>
                    <small>Total Kelas yang tersedia</small>
                </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <div class="avatar">
                    <div class="avatar-initial bg-danger rounded-circle shadow-xs"> <!-- Red background -->
                        <i class="fas fa-book"></i> <!-- Icon for Jurusan -->
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-1">Jurusan</h6>
                    <div class="d-flex flex-wrap mb-1 align-items-center">
                    <h4 class="mb-0 me-2">{{ $jumlahJurusan }}</h4>
                    </div>
                    <small>Total jurusan yang tersedia</small>
                </div>
                </div>
            </div>

            </div>
        </div><!-- End Left side columns -->
        <!-- Right side columns -->
        <div class="col-lg-4">


        </div><!-- End Right side columns -->
        </div>
    </section>


@endsection
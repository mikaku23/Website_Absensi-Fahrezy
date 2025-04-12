@extends('template-walikelas.layout')
@section('title', 'Dashboard Guru')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection
@section('konten')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h4 class="mb-3">Selamat Datang, {{ $guru ? $guru->nama : 'Guru' }}</h4>
                    <p>Silahkan klik menu <strong>Absensi</strong> untuk mulai mengabsensi siswa.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Announcements Section -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Petunjuk</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Pastikan untuk membuka website absensi setiap hari sebelum pukul 08:00 WIB.</li>
                        <li>Selalu periksa notifikasi pengajuan izin sakit dari siswa dengan menekan tombol "lonceng" di kanan atas.</li>
                        <li>Jika ada notifikasi, segera tindak lanjuti dengan mengklik "lihat detail".</li>
                        <li>Ketika form pengajuan muncul, pastikan bukti yang diajukan siswa sesuai.</li>
                        <li>Jika bukti sesuai, klik "titik tiga" di kolom aksi, lalu pilih tombol "Diterima".</li>
                        <li>Jika bukti tidak sesuai, klik "titik tiga" di kolom aksi, lalu pilih tombol "Ditolak".</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
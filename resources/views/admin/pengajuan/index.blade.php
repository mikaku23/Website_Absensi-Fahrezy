@extends('template-admin.layout')
@section('title', $title)
@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')
<div class="card">
    <h5 class="card-header">Data Pengajuan Siswa</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Bukti Berupa Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuans as $pengajuan)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengajuan->siswa->nama }}</td>
                        <td>{{ $pengajuan->keterangan }}</td>
                        <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                        <td>
                            {{ $pengajuan->status }}
                        </td>
                        <td>
                            <img src="{{ asset('foto/'.$pengajuan->foto) }}" alt="Foto" width="100" class="rounded">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
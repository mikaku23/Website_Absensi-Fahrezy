@extends('template-siswa.layout')
@section('title', $title)
@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')
<div class="card">
    <a href="{{route('pengajuan.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Ajukan</a>
    <h5 class="card-header">Pengajuan {{ $siswa->nama }}</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
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
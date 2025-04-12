@extends('template-siswa.layout')
@section('title', 'Data Kelas')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')
<div class="card">
    <h5 class="card-header">Rekap Absensi {{$siswa->nama}}</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Status</th>
                        <th>Guru yang Mengabsen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapAbsensi as $rekap)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$rekap->tanggal_absen}}</td>
                        <td>{{$rekap->jam_absen}}</td>
                        <td>{{$rekap->status}}</td>
                        <td>{{$rekap->guru->nama}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
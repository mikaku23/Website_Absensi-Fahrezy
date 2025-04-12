@extends('template-walikelas.layout')
@section('title', 'Show Data Pengajuan')

@section('konten')
<div class="card">
    <h5 class="card-header">Data Pengajuan</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jam Pengajuan</th>
                        <th>Keterangan</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuans as $pengajuan)
                    <tr>
                        <td>{{ $pengajuan->siswa->nama }}</td>
                        <td>{{ $pengajuan->siswa->local->nama }}</td>
                        <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                        <td>{{ $pengajuan->jam_absen }}</td>
                        <td>{{ $pengajuan->keterangan }}</td>
                        <td>
                            <img src="{{ asset('foto/' . $pengajuan->foto) }}" alt="Foto Siswa" class="img-thumbnail" style="max-width: 100px;">
                        </td>
                        <td>
                            <span class="badge rounded-pill 
                                {{ $pengajuan->status == 'diterima' ? 'bg-label-success' : ($pengajuan->status == 'ditolak' ? 'bg-label-danger' : 'bg-label-warning') }}">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('pengajuan.updateStatus', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="status" value="diterima" class="dropdown-item waves-effect text-success">
                                            <i class="ri-check-line me-1"></i> Diterima
                                        </button>
                                        <button type="submit" name="status" value="ditolak" class="dropdown-item waves-effect text-danger">
                                            <i class="ri-close-line me-1"></i> Ditolak
                                        </button>
                                       
                                    </form>
                                    <a class="dropdown-item waves-effect" href="{{ url()->previous() }}">
                                        <i class="ri-arrow-left-line me-1"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
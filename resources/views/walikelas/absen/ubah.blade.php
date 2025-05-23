@extends('template-walikelas.layout')
@section('title', 'Ubah status absen' . $mengabsen->siswa->nama)
@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data {{$mengabsen->siswa->nama}}</h5>
            <small class="text-muted float-end">Ubah status absen</small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('absenWalikelas.update', $mengabsen->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="status">Status Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                            <option value="hadir" {{ $mengabsen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="sakit" {{ $mengabsen->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="izin" {{ $mengabsen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="alpa" {{ $mengabsen->status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('absenWalikelas.index') }}">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

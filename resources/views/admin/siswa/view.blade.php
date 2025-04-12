@extends('template-admin.layout')
@section('title', 'Show Data ' . $siswa->nama)



@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Show Data {{$siswa->nama}}</h5>
            <small class="text-muted float-end">Detail Information</small>
        </div>
        <div class="card-body">
            <form>
                @csrf
                <div class="row mb-4">
                    <label for="nisn" class="col-sm-2 col-form-label">Nisn</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nisn" name="nisn" value="{{$siswa->nisn}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$siswa->nama}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="{{$siswa->username}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select name="id_local" id="id_local" class="form-control" disabled>
                            <option disabled selected value="{{$siswa->local_id}}">{{ $siswa->local ? $siswa->local->nama : 'Pilih Kelas' }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" id="jk" class="form-control" disabled>
                            <option disabled selected value="{{$siswa->jk}}">{{$siswa->jk}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" class="form-control" disabled>{{ $siswa->alamat }}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nohp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp" name="nohp" value="{{$siswa->nohp}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nama_wm" class="col-sm-2 col-form-label">Nama WaliMurid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_wm" name="nama_wm" value="{{$siswa->nama_wm}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="alamat_wm" class="col-sm-2 col-form-label">Alamat WaliMurid</label>
                    <div class="col-sm-10">
                        <textarea name="alamat_wm" id="alamat_wm" class="form-control" disabled>{{ $siswa->alamat_wm }}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nohp_wm" class="col-sm-2 col-form-label">Nomor Handphone WaliMurid</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp_wm" name="nohp_wm" value="{{$siswa->nohp_wm}}" disabled>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('siswa.index')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
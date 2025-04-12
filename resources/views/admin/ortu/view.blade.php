@extends('template-admin.layout')
@section('title', 'Show Data Ortu ' . $ortu->nama)



@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Show Data Orang Tua {{$ortu->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                @csrf
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="nama">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$ortu->nama}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="id_local">Kelas Siswa</label>
                    <div class="col-sm-10">
                        <select name="id_local" id="id_local" class="form-control" disabled>
                            <option disabled selected value="{{$ortu->local_id}}">{{ $ortu->local ? $ortu->local->nama : 'Pilih Kelas' }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="nama_wm">Nama Wali Murid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_wm" name="nama_wm" value="{{$ortu->nama_wm}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="alamat_wm">Alamat Wali Murid</label>
                    <div class="col-sm-10">
                        <textarea name="alamat_wm" id="alamat_wm" class="form-control" disabled>{{ $ortu->alamat_wm }}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="nohp_wm">Nomor Handphone Wali Murid</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp_wm" name="nohp_wm" value="{{$ortu->nohp_wm}}" disabled>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('ortu.index')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('template-admin.layout')
@section('title', 'Mengedit Data ' . $jurusan->nama)
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data {{$jurusan->nama}}</h5>
            <small class="text-muted float-end">Form Edit Jurusan</small>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{route('jurusan.update', $jurusan->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$jurusan->nama}}" placeholder="masukkan nama jurusan">
                        <div class="form-text">Contoh pengisian: RPL 1</div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('jurusan.index')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="reset" class="btn btn-warning">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
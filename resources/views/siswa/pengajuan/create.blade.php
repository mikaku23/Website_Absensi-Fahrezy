@extends('template-siswa.layout')
@section('title', 'Mengajukan')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Mengajukan</h5>
            <small class="text-muted float-end">Form Pengajuan</small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="keterangan">Alasan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" required></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="foto">Bukti (Asli)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('pengajuan.index')}}" class="btn btn-primary">
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

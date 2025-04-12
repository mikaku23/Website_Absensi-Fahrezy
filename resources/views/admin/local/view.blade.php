@extends('template-admin.layout')
@section('title', 'Show Data ' . $local->nama)



@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Show Data {{$local->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                @csrf
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="nama">Nama Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$local->nama}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="wali_kelas">Wali Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="{{$local->guru->nama}}" disabled>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('local.index')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
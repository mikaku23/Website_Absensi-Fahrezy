@extends('template-admin.layout')
@section('title', 'Tambah Data Kelas')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data Kelas</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ route('local.store') }}">
                @csrf
                <div class="row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-10">
                        <select name="nama" id="nama" class="form-control" required>
                            <option disabled selected value="">Pilih Angkatan</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                            <option value="XIII">XIII</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="id_jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                            <option disabled selected value="">Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                            <option value="{{$j['id']}}">{{$j['nama']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="id_guru" class="col-sm-2 col-form-label">Wali Kelas</label>
                    <div class="col-sm-10">
                        <select name="id_guru" class="form-control" required>
                            <option disabled selected value="">Pilih Wali Kelas</option>
                            @foreach ($guru as $g)
                            <option value="{{ $g->id }}"
                                @if (in_array($g->id, $guru_terpakai)) disabled @endif>
                                {{ $g->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('local.index')}}" class="btn btn-primary">
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
@extends('template-admin.layout')
@section('title', 'Show Data ' . $walikelas->nama)



@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Show Data {{$walikelas->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                @csrf
                <div class="row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$walikelas->nama}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" id="jk" class="form-control" disabled>
                            <option disabled selected value="{{$walikelas->jk}}">{{$walikelas->jk}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nohp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp" name="nohp" value="{{$walikelas->nohp}}" disabled>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('walikelas.index')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
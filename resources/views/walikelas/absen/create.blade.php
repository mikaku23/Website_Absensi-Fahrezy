@extends('template-walikelas.layout')
@section('title', 'Absen Siswa')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('absenWalikelas.index')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Absen Siswa</h5>
            <small class="text-muted float-end">Form Absen</small>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('absenWalikelas.create') }}">
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="kelas">Kelas</label>
                    <div class="col-sm-10">
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            @foreach($locals as $local)
                            <option value="{{ $local->id }}" {{ request('kelas') == $local->id ? 'selected' : '' }}>
                                {{ $local->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Filter</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('absenWalikelas.membuat') }}">
                @csrf
                <div class="table-responsive text-nowrap mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Alpa</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($datasiswa as $dg)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dg->nama}}</td>
                                <td>{{$dg->local->nama}}</td>
                                <td>
                                    <input type="radio" name="status[{{ $dg->id }}]" value="hadir" class="select-hadir">
                                </td>
                                <td>
                                    <input type="radio" name="status[{{ $dg->id }}]" value="sakit" class="select-sakit">
                                </td>
                                <td>
                                    <input type="radio" name="status[{{ $dg->id }}]" value="alpa" class="select-alpa">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
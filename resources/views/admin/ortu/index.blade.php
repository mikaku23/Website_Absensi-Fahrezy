
@extends('template-admin.layout')
@section('title', 'Data Ortu Siswa')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')
<div class="card">
    <h5 class="card-header">Manajemen Data Orang Tua Siswa</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Nama Orang Tua</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($ortu as $dg)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dg->nama}}</td>
                        <td>{{$dg->nama_wm}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item waves-effect" href="{{ route('ortu.show', $dg->id) }}"><i class="ri-eye-line me-1"></i> Show</a>

                                
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
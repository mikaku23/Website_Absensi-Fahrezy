@extends('template-admin.layout')
@section('title', 'Data jurusan')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')

<div class="card">
    <div class="action-btns mb-2">
        <a href="{{route('jurusan.create')}}" class="btn btn-success btn-custom-width"><i class="fas fa-plus"></i> Tambah Data Jurusan</a>
        <a href="{{route('local.index')}}" class="btn btn-primary btn-custom-width"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <h5 class="card-header">Manajemen Data Jurusan</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($jurusan as $dg)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dg->nama}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item waves-effect" href="{{ route('jurusan.show', $dg->id) }}"><i class="ri-eye-line me-1"></i> Show</a>
                                    <a class="dropdown-item waves-effect" href="{{route('jurusan.edit',$dg['id'])}}"><i class="ri-pencil-line me-1"></i> Edit</a>
                                
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
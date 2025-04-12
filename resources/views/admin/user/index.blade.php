@extends('template-admin.layout')
@section('title', 'Data user')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')
<div class="card">
    <a href="{{route('user.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Tambah Data user</a>
    <h5 class="card-header">Manajemen Data user</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($datauser as $ds)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ds->username}}</td>
                        <td>{{$ds->level}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item waves-effect" href="{{ route('user.show', $ds->id) }}"><i class="ri-pencil-line me-1"></i> Edit</a>
                                    <form action="{{route('user.destroy',$ds['id'])}}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item waves-effect" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"><i class="ri-delete-bin-6-line me-1"></i> Delete</button>
                                    </form>
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
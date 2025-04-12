@extends('template-admin.layout')
@section('title', 'Data Wali Kelas')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('konten')

<div class="card">
    <h5 class="card-header">Manajemen Data Wali Kelas</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($walikelas as $wk)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$wk->nama}}</td>
                        <td>
                            {{ $wk->guru ? $wk->guru->nama : 'Guru tidak ditemukan' }}
                            @if ($wk->guru)
                            <a href="{{ route('walikelas.show', $wk->guru->id) }}" class='btn btn-outline-primary btn-sm' style="margin-left: 10px;">
                                <i class='fas fa-eye' title="show"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
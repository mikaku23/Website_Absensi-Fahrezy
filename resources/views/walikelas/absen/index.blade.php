@extends('template-walikelas.layout')
@section('title', 'Data Absen')
@section('css')
<!-- Other head content -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection
@section('konten')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif
<div class="card">
    <a href="{{route('absenWalikelas.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Absen Siswa</a>
    <h5 class="card-header">Management Data Absen</h5>
    <div class="card-body">
        <form method="GET" action="{{ route('absenWalikelas.index') }}">
            <div class="row mb-3">
                <div class="col-md-4">
                    <select name="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        @foreach($locals as $local)
                        <option value="{{ $local->id }}" {{ request('kelas') == $local->id ? 'selected' : '' }}>
                            {{ $local->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="date" name="tanggal_absen" class="form-control" value="{{ request('tanggal_absen') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Tanggal Absen</th>
                        <th>Jam Absen</th>
                        <th>Guru yang Mengabsen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataabsen as $da)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$da->siswa->nama}}</td>
                        <td>{{$da->siswa->local->nama}}</td>
                        <td>{{$da->status}}</td>

                        <td>{{$da->tanggal_absen}}</td>
                        <td>{{$da->jam_absen}}</td>
                        <td>{{$da->guru->nama}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('absenWalikelas.edit', $da->id) }}">
                                        <i class="ri-pencil-line me-1"></i> Edit
                                    </a>

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
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endsection
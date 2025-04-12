@extends('template-admin.layout')
@section('title', 'Mengedit Data ' . $guru->nama)
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data {{$guru->nama}}</h5>
            <small class="text-muted float-end">Detail Information</small>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{route('guru.update', $guru->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" value="{{$guru->nip}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$guru->nama}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="{{$guru->username}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="biarkan kosong jika tidak ingin mengganti password">
                            <span class="input-group-text" onclick="togglePassword()">
                                <i id="eyeIcon" class="bi bi-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" id="jk" class="form-control">
                            <option disabled selected value="{{$guru->jk}}">{{$guru->jk}}</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nohp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp" name="nohp" value="{{$guru->nohp}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$guru->tanggal_lahir}}">
                    </div>
                </div>
                <input type="hidden" name="id_user" value="3">
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('guru.index')}}" class="btn btn-primary">
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
@section('js')
<script>
    function togglePassword() {
        let passwordInput = document.getElementById("password");
        let eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }
</script>

@endsection
@extends('template-admin.layout')
@section('title', 'Mengedit Data ' . $siswa->nama)
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data {{$siswa->nama}}</h5>
            <small class="text-muted float-end">Form Input</small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('siswa.update', $siswa->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label for="nisn" class="col-sm-2 col-form-label">Nisn</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nisn" name="nisn" value="{{$siswa->nisn}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$siswa->nama}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="{{$siswa->username}}">
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
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select name="id_local" id="id_local" class="form-control">
                            <option disabled selected value="{{$siswa->local_id}}">{{ $siswa->local ? $siswa->local->nama : 'Pilih Kelas' }}</option>
                            @foreach($kelas as $k)
                            <option value="{{$k['id']}}">{{$k['nama']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk" id="jk" class="form-control">
                            <option disabled selected value="{{$siswa->jk}}">{{$siswa->jk}}</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" class="form-control">{{$siswa->alamat}}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nohp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp" name="nohp" value="{{$siswa->nohp}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nama_wm" class="col-sm-2 col-form-label">Nama WaliMurid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_wm" name="nama_wm" value="{{$siswa->nama_wm}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="alamat_wm" class="col-sm-2 col-form-label">Alamat WaliMurid</label>
                    <div class="col-sm-10">
                        <textarea name="alamat_wm" id="alamat_wm" class="form-control">{{$siswa->alamat_wm}}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nohp_wm" class="col-sm-2 col-form-label">Nomor Handphone WaliMurid</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp_wm" name="nohp_wm" value="{{$siswa->nohp_wm}}">
                    </div>
                </div>
                <input type="hidden" name="id_user" value="3">
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('siswa.index')}}" class="btn btn-primary">
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
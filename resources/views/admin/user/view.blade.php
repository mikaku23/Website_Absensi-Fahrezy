@extends('template-admin.layout')
@section('title', 'Show Data ' . $user->username)



@section('konten')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Show Data {{$user->username}}</h5>
        </div>
        <div class="card-body">
            <form>
                @csrf
                <div class="row mb-4">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="level" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="level" name="level" value="{{$user->level}}" disabled>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{route('user.index')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('users.index') }}"> <i class="fas fa-arrow-left"></i> kembali</a>
                    <h4 class="card-title">Edit Pengguna</h4>
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Nama Pengguna</label>
                            <input name="name" type="text" class="form-control" placeholder="Nama Pengguna"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Peran (Role)</label>
                            <select class="form-control" name="role" required>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="Konfirmasi Password">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mb-3 ms-0">Edit </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

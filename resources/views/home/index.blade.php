@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center" style="margin-top:150px">
            <div class="col-md-6">
                <form action="/search">

                    <div class="input-group mb-3">
                        <input type="text" autocomplete="off" class="form-control" name="search">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <a href="/home/post/create" class="btn btn-primary"> Tambah Data</a>
                        <a href="/logout" class="btn btn-secondary">Logout</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat KTP</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Pendidikan Terakhir</th>
                                    <th scope="col">Nomor Telpon</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profile as $profiles)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $profiles->user->username }}</td>
                                        <td>{{ $profiles->user->email }}</td>
                                        <td>{{ $profiles->alamat_ktp }}</td>
                                        <td>{{ $profiles->pekerjaan }}</td>
                                        <td>{{ $profiles->nama_lengkap }}</td>
                                        <td>{{ $profiles->pendidikan_terakhir }}</td>
                                        <td>{{ $profiles->nomor_telpon }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="/home/post/{{ $profiles->id }}"
                                                        class="btn btn-success">Show</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="/home/post/{{ $profiles->id }}/edit"
                                                        class="btn btn-warning">edit</a>
                                                    <form action="/home/post/{{ $profiles->id }}" method="post"><br>
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $profiles->id }}">
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('yakin?')">Delete</button>
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
        </div>
    </div>
@endsection

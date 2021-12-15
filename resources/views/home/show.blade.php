@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center" style="margin-top:150px">
            <div class="col-md-12">

                <div class="card shadow">
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat KTP</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Pendidikan Terakhir</th>
                                    <th scope="col">Nomor Telpon</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profile as $profiles)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $profiles->user->name }}</td>
                                        <td>{{ $profiles->user->username }}</td>
                                        <td>{{ $profiles->user->email }}</td>
                                        <td>{{ $profiles->alamat_ktp }}</td>
                                        <td>{{ $profiles->pekerjaan }}</td>
                                        <td>{{ $profiles->nama_lengkap }}</td>
                                        <td>{{ $profiles->pendidikan_terakhir }}</td>
                                        <td>{{ $profiles->nomor_telpon }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <a href="/">Back</a>
            </div>
        </div>
    </div>
@endsection

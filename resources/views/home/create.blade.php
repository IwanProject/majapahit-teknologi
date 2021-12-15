@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center" style="margin-top:50px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah Data
                    </div>
                    <div class="card-body">
                        <form action="/home/post" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                                <input type="text" class="form-control" name="alamat_ktp" id="alamat_ktp">
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                            </div>

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                            </div>

                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="pendidikan_terakhir"
                                    id="pendidikan_terakhir">
                            </div>

                            <div class="mb-3">
                                <label for="nomor_telpon" class="form-label">Nomor Telpon</label>
                                <input type="text" class="form-control" name="nomor_telpon" id="nomor_telpon">
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

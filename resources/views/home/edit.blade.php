@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center" style="margin-top:50px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Data
                    </div>

                    <div class="card-body">
                        <form action="/home/post/{{ $profile[0]->id }}" method="post">
                            @method('put')
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $profile[0]->user->id }}">
                            <input type="hidden" name="id" value="{{ $profile[0]->id }}">
                            <div class="mb-3">
                                <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                                <input type="text" class="form-control" name="alamat_ktp" id="alamat_ktp"
                                    value="{{ $profile[0]->alamat_ktp }}">
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                    value="{{ $profile[0]->pekerjaan }}">
                            </div>

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                    value="{{ $profile[0]->nama_lengkap }}">
                            </div>

                            <div class="mb-3">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="pendidikan_terakhir"
                                    id="pendidikan_terakhir" value="{{ $profile[0]->pendidikan_terakhir }}">
                            </div>

                            <div class="mb-3">
                                <label for="nomor_telpon" class="form-label">Nomor Telpon</label>
                                <input type="text" class="form-control" name="nomor_telpon" id="nomor_telpon"
                                    value="{{ $profile[0]->nomor_telpon }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

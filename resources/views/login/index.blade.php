@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="card">

                    @if (session()->has('LoginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('LoginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="/login" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <br>
                        <a href="/register">Sign Up?</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

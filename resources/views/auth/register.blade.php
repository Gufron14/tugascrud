@extends('layout.apps')

@section('content')
    <div class="w-50 center bordered-rounded px-3 py-3 mx-auto">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="fw-bold text-center">Register</h4>
        <form action=" {{ route('doRegister') }} " method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Nama</label>
                <input type="name" value="{{ Session::get('name') }}" name="name" class="form-control">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
            </div>
            <div>
                <p class="text-center"> Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </form>
            </div>
        </div>
        
    </div>
@endsection
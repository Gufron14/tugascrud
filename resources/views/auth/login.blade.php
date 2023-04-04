<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <title>Selamat Datang</title>
</head>
<body>

    @if (session('message'))
        <div class="alert alert-danger mt-3">
            {{ session('message') }}
        </div>
    @endif

    <div class="w-25 justify-content-center align-items-center mx-auto">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="fw-bold text-center">Login</h4>
                <form action=" {{ route('doLogin') }} " method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" @error('email') is-invalid @enderror" value="{{ Session::get('email') }}" name="email" class="form-control">
                        @error('email')
                            <div id="emailHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="div mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" @error('password') is-invalid @enderror" name="password" class="form-control">
                        @error('password')
                            <div id="passwordHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="div mb-3">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <div class="text-center">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
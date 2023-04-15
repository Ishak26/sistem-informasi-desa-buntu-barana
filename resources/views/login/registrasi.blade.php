<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/registras.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class="bg-body">

    <div class="registrasi shadow-lg p-3 mb-5  rounded ">
        <h3 class=" mb-3 text-center">Registrasi</h3>
        <form action="/registrasi" method="post">
            @csrf
            <div class="px-5 mb-1 ">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    autocomplete="off" id="exampleFormControlInput1" placeholder="Username" required autofocus
                    value="{{ old('username') }}">
            </div>
            @error('username')
                <div class="invalid-feedback">
                    {{ $errors->has('username') }}
                </div>
            @enderror



            <div class="px-5
                    mb-1 ">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Email" required value="{{ old('email') }}"
                    autocomplete="off">
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $errors->has('email') }}
                </div>
            @enderror


            <div class="px-5 mb-1">
                <label for="password" class="form-label">Password</label>
                <input min="5" name="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password"
                    required value="{{ old('password') }}" autocomplete="off">
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $errors->has('password') }}
                </div>
            @enderror



            <div class="px-5 mb-1">
                <label for="Cpassword" class="form-label">Konfirmasi Password</label>
                <input min="5" name="konfirmasi" type="password"
                    class="form-control @error('konfirmasi') is-invalid @enderror" id="Cpassword"
                    placeholder="konfirmasi" required value="{{ old('konfirmasi') }}" autocomplete="off">
                @if (session()->has('errorkonfirmasi'))
                    <div class="invalid-feedback">
                        {{ session('errorkonfirmasi') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>

        </form>
        <p class="text-center"> Klik di sini untuk <a class="text-decoration-none" href="/login">login </a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

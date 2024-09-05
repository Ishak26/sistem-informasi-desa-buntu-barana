<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite('resources/js/app.js')
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    @error('email')
        <div class="alert alert-warning fixed-top text-center m-auto " role="alert" style="width: 500px;">
            {{ $message }}
        </div>
    @enderror


    <main class="form-signin w-100 m-auto">

        <form action="/login" method="post">
            @csrf
            <img class="d-block m-auto mb-4" src="img/R.png" alt="" width="72" height="80">
            {{-- <img class="m-auto" src="img/R.png" width="50" height="50" alt=""> --}}

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com" required value=" {{ old('email') }}">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>

            {{-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> --}}
            <button class="w-100 btn btn-lg btn-bluedark"  type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-center text-muted">&copy; Sistem Informasi Desa Buntu Barana</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    
</body>

</html>

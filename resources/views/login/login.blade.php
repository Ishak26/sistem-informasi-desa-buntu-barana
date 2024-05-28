<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet">
    <style>
        .btn-ungu{
            background-color: #0E5E6F;
        }
    </style>


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
            {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal">Login</h1>

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
            <button class="w-100 btn btn-lg btn-ungu text-white"  type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; Sistem informasi desa</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    
</body>

</html>

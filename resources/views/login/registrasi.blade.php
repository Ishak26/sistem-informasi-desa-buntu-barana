<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>

    <link rel="stylesheet" href="/css/main.min.css">  
    <link href="css/registras.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

</head>

<body class="bg-body">

    <div class="registrasi shadow-lg p-3  rounded  ">
        <h4 class="encode-sans-condensed-extrabold text-bluelight mb-3 text-center">REGISTRASI</h4>
        <form action="/registrasi" method="post">
            @csrf
            <div class="form-floating mb-1">
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                autocomplete="off" id="exampleFormControlInput1" placeholder="Username" required autofocus
                value="{{ old('username') }}" id="floatingInput">
                <label class="form-label">Username</label>
            </div>
            @error('username')
                <div class="invalid-feedback">
                    {{ $errors->has('username') }}
                </div>
            @enderror

            <div class="form-floating mb-1">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email" required value="{{ old('email') }}"
                autocomplete="off" id="floatingInput">
                <label class="form-label">Email</label>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $errors->has('email') }}
                </div>
            @enderror
            <div class="form-floating mb-1 ">
                <select name="bidang" type="text" class="form-select @error('bidang') is-invalid @enderror"
                placeholder="Bidang Kerja" required value="{{ old('bidang') }}"
                autocomplete="off" id="floatingInput">
                    <option value="" selected>--Pilih--</option>
                    <option value="KEPALA DESA">KEPALA DESA</option>
                    <option value="SEKERTARIS">SEKERTARIS</option>
                    <option value="KASI KESEJAHTERAAN MASYARAKAT">KASI KESEJAHTERAAN MASYARAKAT</option>
                    <option value="KASI KEMASYARAKATAN">KASI KEMASYARAKATAN</option>
                    <option value="KASI PEMERINTAHAN">KASI PEMERINTAHAN</option>
                </select>
            <label for="bidang" class="text-dark form-label">Bidang kerja</label>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $errors->has('email') }}
                </div>
            @enderror
            <div class="form-floating mb-1">
                <input min="5" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="password"
                required value="{{ old('password') }}" autocomplete="off">
                <label for="password" class="form-label">Password</label>
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $errors->has('password') }}
                </div>
            @enderror



            <div class="form-floating mb-1">
                <input min="5" name="konfirmasi" type="password"
                class="form-control @error('konfirmasi') is-invalid @enderror" id="floatingInput"
                placeholder="konfirmasi" required value="{{ old('konfirmasi') }}" autocomplete="off">
                <label for="Cpassword" class="form-label">Konfirmasi Password</label>
                @if (session()->has('errorkonfirmasi'))
                <div class="invalid-feedback">
                        {{ session('errorkonfirmasi') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-bluedark mt-3">simpan</button>
            </div>

        </form>
        <p class="text-center text-muted fs-6">klik disini untuk <a class="" href="/login">login </a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout example · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="bg-light">
    <div
        class="p-4 p-md-5 mb-4 rounded "style="background-image:url('img/ALBU.jpg'); backround-size:cover; background-position:center;">
        <div class="col-md-6 p-4 text-white " style="background-color: rgba(0,0,0,.6);">
            <h1 class="display-4 ">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class=" row">
        <div class="col-4 text-center fw-bold">
            <h3>Berita</h3>
        </div>
        <div class="col-4">
            <form action="">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Cari</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        placeholder="Cari berita">
                </div>
            </form>
        </div>
        <div class="col-auto text-center">
            <div class="btn-group r">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Category
                </button>
                <ul class="dropdown-menu">
                    <li></li>
                </ul>
            </div>
        </div>

        <div class="container">

            <div class="row mb-2">
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">World</strong>
                            <h3 class="mb-0">Featured post</h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p>
                            <a href="#" class="stretched-link">Continue reading</a>
                        </div>

                        <div class="col-auto d-none d-lg-block">
                            <img src="img/{{ $Dberita['gambar'] }}" alt="" width="200" height="250">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success"> <a
                                    href="/category/{{ $Dberita->category->slug }}">{{ $Dberita->category->category }}
                                </a></strong>
                            <h3 class="mb-0">{{ $Dberita['judul'] }}</h3>
                            <div class="mb-1 text-muted">Nov 11</div>
                            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                                additional content.</p>
                            <a href="/berita/{{ $Dberita->slug }}#" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="img/ALBU.jpg" alt="" width="200" height="250">

                        </div>
                    </div>
                </div>
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; Sistem informasi desa</p>
            </footer>
        </div>


        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="form-validation.js"></script>
</body>

</html>

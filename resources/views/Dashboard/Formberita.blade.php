@extends('Dashboard.layout.main')

@section('container')
@if (session('sukses'))
       <script>alert('{{session('sukses')}}');</script>
    @endif
    <form action="/formberita" method="post" enctype="multipart/form-data">
        @csrf
        <legend>Form Berita</legend>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="judul" name="judul"
                placeholder="Masukkan judul Berita"class=" "value="{{ old('judul') }}" autofocus required>
            <span class="text-danger"> @error('judul')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-select"
                class=" @error('category')  is-invalid {{ $message }} @enderror" required>
                <option selected>Pilih Category</option>
                <option value="1">acara</option>
                <option value="2">Gotong royong</option>
                <option value="3">Politik</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"value="{{ old('slug') }}"
                placeholder="Masukkan slug yg unik" class=" @error('slug')  is-invalid {{ $message }} @enderror">
            <span class="text-danger"> @error('slug')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <label for="gambar" class="form-label">Upload Gambar</label>
        <div class="input-group mb-3">
            <input type="file" name="gambar" class="form-control " id="gambar"
                class=" @error('gambar')  is-invalid {{ $message }} @enderror">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </span>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="datetime-local" name="time" class="form-control" id="time"
                class=" @error('time')  is-invalid {{ $message }} @enderror" required>
            <span class="text-danger"> @error('time')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="mb-3">
            <label for="Textberita" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="Textberita" rows="7" placeholder="Masukkan Deskripsi Berita"
                class=" @error('deskripsi')  is-invalid {{ $message }} @enderror"></textarea>
            <span class="text-danger"> @error('deskripsi')
                    {{ $message }}
                @enderror
            </span>
        </div>


        <button type="submit" class="btn btn-primary p-2 mb-5">Simpan</button>
    </form>
@endsection

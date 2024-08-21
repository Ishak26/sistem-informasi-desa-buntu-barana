@extends('Dashboard.layout.main')

@section('container')
<style>
    trix-editor{
        height: 200px;
        overflow: scroll;
    }
</style>
@if (session('sukses'))
       <script>alert('{{session('sukses')}}');</script>
@endif
    <form action="/formberita" method="post" enctype="multipart/form-data">
        @csrf
        <p class="text-center fs-3 encode-sans-condensed-extrabold text-bluedark text-uppercase">Form Berita</p>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                placeholder="Masukkan judul Berita" value="{{ old('judul') }}" >
                @error('judul')
                    <div id="validationServer04Feedback" class="invalid-feedback">
                       <p>{{ $message }}</p>
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-select"
                class=" @error('category')is-invalid @enderror" >
                <option selected>--Pilih Category--</option>
               @foreach ($kategori as $item)
                   <option {{(old('category_id'==$item->id)?'selected':'')}} value="{{$item->id}}">{{$item->category}}</option>
               @endforeach
            </select>
            @error('category_id')
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"value="{{ old('slug') }}"
                placeholder="Masukkan slug yg unik" class=" @error('slug')  is-invalid {{ $message }} @enderror">
            @error('slug')
                <div id="validationServer04Feedback" class="invalid-feedback">
                   <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <img src="" class="m-auto d-block" alt="" id="gambarBerita">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <div class="input-group mb-3">
            <input type="file" name="gambar" class="form-control" id="gambar" onchange="previewImage('gambarBerita','#gambar')"
                class=" @error('gambar')  is-invalid {{ $message }} @enderror">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </span>
            @error('gambar')
                <div id="validationServer04Feedback" class="invalid-feedback">
                <p>{{ $message }}</p>
                </div>
             @enderror
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Waktu</label>
            <input type="date" name="time" class="form-control" id="time"
                class=" @error('time')  is-invalid @enderror" >
            @error('time')
                <div id="validationServer04Feedback" class="invalid-feedback">
                   <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Textberita" class="form-label">Deskripsi</label>
            <input id="x" type="hidden" value="{{old('deskripsi')}}" name="deskripsi" class="form-control h-50 @error('deskripsi')  is-invalid @enderror">
                <trix-editor input="x" ></trix-editor>
            @error('deskripsi')
                <div id="validationServer04Feedback" class="invalid-feedback">
                   <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary p-2 mb-5">Simpan</button>
    </form>
@endsection

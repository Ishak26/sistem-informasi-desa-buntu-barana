@extends('Dashboard.layout.main')
@section('container') 
   <form action="/updatedataberita/{{$edit->slug}}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf      
      <legend>Update Berita</legend>
      <div class="mb-3">
         <label for="judul"  class="form-label">Judul Berita</label>
         <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul Berita" class=" @error('judul')  is-invalid @enderror" required  autofocus value="{{$edit->judul}}" >
         @error('judul')
             <div class="invalid-fedback">
               {{$message}}
             </div>
         @enderror
      </div>
      <div class="mb-3">
         <label for="category" class="form-label">Category</label>
            <select  name="category_id" id="category"  class="form-select" class=" @error('category')  is-invalid @enderror" required >            
              @foreach ($kategori as $item)
               <option value="{{$item->id}}" {{($item->id===$edit->category_id)? "selected":""}} >{{$item->category}} </option>
              @endforeach
            </select>
            @error('category_id')
            <div class="invalid-fedback">
              {{$message}}
            </div>
        @enderror
         </div>
      <div class="mb-3">
         <label for="slug" class="form-label">Slug</label>
         <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukkan slug yg unik" class=" @error('slug')  is-invalid @enderror" required value="{{$edit->slug}}" >
         @error('slug')
         <div class="invalid-fedback">
           {{$message}}
         </div>
     @enderror
      </div>
      <label for="gambar" class="form-label">Upload Gambar</label>
      <img id="updateGambar" class="p-3 text-center" src="../../img/banjir-menerjang-kecamatan-kabere-enrekang_169.jpeg" width="250" height="250">
      <div class="input-group mb-3">
         <input type="file" name="gambar" class="form-control updateImgberita @error('gambar')  is-invalid @enderror" onchange="previewImage('updateGambar','.updateImgberita')"  value="{{$edit->gambar}}">
         @error('gambar')
         <div class="invalid-fedback">
           {{$message}}
         </div>
     @enderror
         <label class="input-group-text" for="inputGroupFile02" aria-placeholder="">Upload</label>
      </div>
      
      <div class="mb-3">
         <label for="time" class="form-label">Waktu</label>
         <input type="datetime-local" name="time" class="form-control" id="time" class=" @error('time')is-invalid @enderror"  required value="{{$edit->time}}">
         @error('time')
            <div class="invalid-fedback">
            {{$message}}
            </div>
         @enderror
      </div>   

      <div class="mb-3">
         <label for="Textberita" class="form-label">Deskripsi</label>
         <textarea name="deskripsi" class="form-control"  id="Textberita" rows="7" placeholder="Masukkan Deskripsi Berita" class=" @error('deskripsi')  is-invalid @enderror" required  >{{$edit->deskripsi}}</textarea>
         @error('judul')
         <div class="invalid-fedback">
           {{$message}}
         </div>
          @enderror
      </div>
         <button type="submit" class="btn btn-primary p-2 mb-5" >Update</button>
   </form>
@endsection
@extends('Dashboard.layout.main')
@section('container') 

@if (session('edit'))
       <script>alert('{{session('edit')}}');</script>
    @endif
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<form action="/updatedataberita/{{$edit->slug}}" method="post">
   @method('put')
   @csrf
   
    <legend>Update Berita</legend>
    <div class="mb-3">
        <label for="judul"  class="form-label">Judul Berita</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul Berita"class=" @error('judul')  is-invalid {{$message}} @enderror" required  autofocus value="{{$edit->judul}}" >
     </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select  name="category_id" id="category"  class="form-select" class=" @error('category')  is-invalid {{$message}} @enderror" required >            
            <option value="1" {{($edit->category_id===1)? "selected":""}} >acara </option>
            <option value="2" {{($edit->category_id===2)? "selected":""}}> Gotong royong </option>
            <option value="3"{{($edit->category_id===3)? "selected":""}}>Politik</option>
   
         </select>
         </div>

     <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukkan slug yg unik" class=" @error('slug')  is-invalid {{$message}} @enderror" required value="{{$edit->slug}}" >
     </div>

    <label for="gambar" class="form-label">Upload Gambar</label>
     <div class="input-group mb-3">
         <input type="file" name="gambar" class="form-control " id="gambar" class=" @error('gambar')  is-invalid {{$message}} @enderror" required value="{{$edit->gambar}}">
         <label class="input-group-text" for="inputGroupFile02" aria-placeholder="">Upload</label>
      </div>
   
   <div class="mb-3">
        <label for="time" class="form-label">Time</label>
        <input type="datetime-local" name="time" class="form-control" id="time" class=" @error('time')is-invalid {{$message}} @enderror"  required value="{{$edit->time}}">
     </div>   

     <div class="mb-3">
        <label for="Textberita" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control"  id="Textberita" rows="7" placeholder="Masukkan Deskripsi Berita" class=" @error('deskripsi')  is-invalid {{$message}} @enderror" required  >{{$edit->deskripsi}}</textarea>
      </div>
      <button type="submit" class="btn btn-primary p-2 mb-5" >Update</button>
</form>
    
@endsection
@extends('Dashboard.layout.main')
@section('container')

{{-- SESSION HANDLING --}}
    @if (session('edit'))
        <script>
            alert('{{ session('edit') }}');
        </script>
    @endif
    <div class="container mt-3">
        @if (session('sukses'))
            <script>
                alert('{{session('sukses')}}')
            </script>
        @endif

        <div class="row justify-content-center">
            <div class=" col-md-5 text-center">
                <img src="{{ asset('storage/' . $kades->foto) }}" class="img-fluid me-4 object-fit" width="300" height="350"
                    alt="">
                <small class="d-block">{{ $kades->nama }}</small>
                <p>Kepala Desa Buntu Barana </p>
            </div>
            <div class="col-md-5">
                <p class="fs-5 fw-semi-bold mb-1">Visi</p>
                <small class="lh-sm text-muted">{{ $kades->visi }}</small>
                <p class="fs-5 fw-semi-bold mb-1">Misi</p>
                <ul class="text-muted ms-0">
                @php
                    $visi = explode(',', $kades->misi);
                @endphp
                    @foreach($visi as $key) 
                        <li class=""> {{$key}} </li>
                    @endforeach
             
            </ul>
            @can('sekertaris')
            <a href="" class="btn btn-sm btn-bluedark m-2" data-bs-toggle="modal" data-bs-target="#Formdata">Update</a>
            @endcan
            </div>
        </div>
        <div class=""></div>
        {{-- modal tambah data --}}
        <div class="modal" tabindex="-1" id="Formdata" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-bluedark">
                        <h4 class="modal-title text-white">Edit profil Kepala Desa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/editkades/{{ $kades->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <img id="fotoKades" class="object-fit text-center" alt="">
                            <div class="mb-3 row">
                                <label for="formFile" class="col-sm-4 form-label">foto</label>
                                <div class="col-sm-8">
                                    <input onchange="previewImage('fotoKades','#formFile')" name="foto" class="form-control" type="file" id="formFile">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $kades->nama }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="visi" class="col-sm-4 col-form-label">Visi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="visi"
                                        name="visi"value="{{ $kades->visi }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="exampleFormControlTextarea1" class="col-sm-4  form-label">Misi</label>
                                <div class="col-sm-8">
                                    <textarea name="misi" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ $kades->misi }}</textarea>
                                    <small class="text-muted">Pisahkan Poin Misi dengan tanda koma.</small>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-bluedark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         {{-- Akhir modal --}}
    </div>  
        <p class=" fs-4 text-bold text-center fw-semibold text-bluelight mt-5">Data Pengaduan Masyarakat</p>
        <table class="table-responsive w-100">
          <tr class="text-center">
            <th>No</th>
            <th>Kritik</th>
            <th >saran</th>
          </tr>
          @foreach ($dataPengaduan as $item)
          <tr class="text-center">
            <td >{{$loop->iteration}}</td>
            <td>{{$item->kritik}}</td>
            <td>{{$item->saran}}</td>
          </tr>
          @endforeach
        </table>
    
        <div class="d-flex justify-content-center">
          {{ $dataPengaduan->links() }}
      </div>
    @endsection

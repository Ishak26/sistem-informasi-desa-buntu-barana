@extends('Dashboard.layout.main')
@section('container')
@include('Dashboard.partials.sessionhandle')
    <div class="container">
        <a href="" class="btn btn-bluedark m-2" data-bs-toggle="modal" data-bs-target="#Formdata"><i class="bi bi-database-fill-add "></i></a>
        <div class="table-responsive-sm">
            <table class="table text-center" cellpaddding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datapegawai as $item)
                        <tr class="">
                            <td >{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td class="d-flex justify-content-center flex-rows text-center gap-1">
                                <button href="" class="btn btn-bluedark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#viewData" onclick="viewPegawai({{$item}})">
                                    <i class="bi bi-eye-fill"></i>
                                </button> 
                                <button href="" class="btn btn-bluelight btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editdata" onclick="editPegawai({{$item}})">
                                    <i class="bi bi-pencil-square"></i>
                                </button> 
                                <form action="/dashboard/pemerintah/{{$item->nip}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="confirmedHapus(event)" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $datapegawai->links() }}
        </div>
        {{-- modal tambah data --}}
        <div class="modal" tabindex="-1" id="Formdata" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-bluedark">
                        <h4 class="modal-title text-bluelight">Tambah Data Pegawai</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/pemerintah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-4 col-form-label">Foto Profil</label>
                                <div class="col-sm-8">
                                    <img id="fotoPegawai" class="object-fit mb-3">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" onchange="previewImage('fotoPegawai','#foto')">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-4 col-form-label">Nip</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip">
                                    @error('nip')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"name="nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                     @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan">
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-4 col-form-label">Nomor Hanphone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" id="hp">
                                    @error('hp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control @error('tanggallahir') is-invalid @enderror" id="taggallahir" name="tanggallahir">
                                    @error('tanggallahir')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="laki-laki">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="perempuan">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                    </label>
                                    @error('jeniskelamin')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
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
            {{-- Akhir modal --}}
        </div>
        {{-- akhir modal tambah data --}}

        {{-- modal edit data --}}
        <div class="modal" tabindex="-1" id="editdata"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-bluedark">
                        <h4 class="modal-title text-bluelight">Edit Data Pegawai</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEdit" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-4 col-form-label">Foto Profil</label>
                                <div class="col-sm-8">
                                    <img id="editFotoPegawai" width="200" height="200" class="object-fit mb-3">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="editFoto" onchange="previewImage('editFotoPegawai','#editFoto')">
                                </div>
                                @error('foto')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                        id="nip">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="mb-3
                                        row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                   <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-4 col-form-label">Nomor
                                    Hanphone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" id="hp">
                                </div>
                            </div>
                            <div
                                class="mb-3
                                            row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        name="alamat">
                                </div>
                            </div>
                            <div
                                class="mb-3
                                                row">
                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal
                                    Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control @error('tanggallahir') is-invalid @enderror" id="tanggallahir"
                                        name="tanggallahir" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jk" class="col-sm-4 col-form-label">Jenis
                                    Kelamin</label>
                                <div class="col-sm-8">
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="laki-laki" id="laki">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="perempuan" id="perempuan">
                                    <label class="form-check-label" for="flexRadioDefault1" >
                                        Perempuan
                                    </label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-bluedark">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- akhir edit modal --}}

        {{-- viewDataPegawai --}}
        <div class="modal" id="viewData">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-bluedark">
                        <h4 class="fs-4 fw-bold text-bluelight">Data Pegawai</h4>
                        <button type="button" data-bs-dismiss="modal" class="btn bt-close text-bluelight">x</button>
                    </div>
                    <div class="modal-body">
                        <img id="viewFoto" class="d-block m-auto object-fit rounded-circle" width="100" height="100" alt="">
                        <table class="w-75 m-auto">
                            @foreach ($fielddata as $data)
                                <tr>
                                    <td>{{$data}}</td>
                                    <td id="data{{$data}}"></td>
                                </tr>
                            @endforeach
                           
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button" >tutup</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- akhir viewDataPegawai --}}

<script> 
    function editPegawai(datas){
        $('#formEdit').attr('action','/dashboard/pemerintah/'+datas.nip+'/update')
        $('#formEdit #editFotoPegawai').attr('src',`/storage/${datas.foto}`)
        $('#editdata #nip').val(datas.nip)
        $('#editdata #nama').val(datas.nama)
        $('#editdata #jabatan').val(datas.jabatan)
        $('#editdata #hp').val(datas.hp)
        $('#editdata #alamat').val(datas.alamat)
        $('#editdata #tanggallahir').val(datas.tanggallahir)
        if(datas.jeniskelamin == 'laki-laki'){
            $('#editdata #laki').prop('checked',true)
        }else{
            $('#editdata #perempuan').prop('checked',true)
        }
    }
    function viewPegawai(datas){
        $('#viewData #datanip').html(': '+datas.nip)
        $('#viewData #datanama').html(': '+datas.nama)
        $('#viewData #datajabatan').html(': '+datas.jabatan)
        $('#viewData #datahp').html(': '+datas.hp)
        $('#viewData #dataalamat').html(': '+datas.alamat)
        $('#viewData #datatanggallahir').html(': '+datas.tanggallahir)
        $('#viewData #datajeniskelamin').html(': '+datas.jeniskelamin)
        $('#viewData #viewFoto').attr('src',`/storage/${datas.foto}`)
    }

</script>

    @endsection

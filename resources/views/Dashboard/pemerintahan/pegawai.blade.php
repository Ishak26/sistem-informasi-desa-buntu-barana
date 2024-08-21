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
                        <th scope="col">Nik</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Nomor Telpon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datapegawai as $item)
                        <tr class="">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>+62-{{ $item->hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->tanggallahir }}</td>
                            <td>{{ $item->jeniskelamin }}</td>
                            <td class="d-flex flex-rows text-center">
                                <a href="" class="btn btn-bluelight btn-sm mx-1" data-bs-toggle="modal"
                                    data-bs-target="#editdata" onclick="editPegawai({{$item}})">
                                    <i class="bi bi-pencil-square"></i>
                                </a> 
                                <form action="/dashboard/pemerintah/{{ $item->nik }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button  id='hapus' class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- modal tambah data --}}
        <div class="modal" tabindex="-1" id="Formdata" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Pegawai</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/pemerintah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-4 col-form-label">Foto Profil</label>
                                <div class="col-sm-8">
                                    <img id="fotoPegawai" class="object-fit mb-3" alt="">
                                    <input type="file" class="form-control" name="foto" id="foto" onchange="previewImage('fotoPegawai','#foto')">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-4 col-form-label">Nik</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"name="nama" id="nama">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jabatan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-4 col-form-label">Nomor Hanphone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="hp" id="hp">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="taggallahir" name="tanggallahir">
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
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Pegawai</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEdit" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-4 col-form-label">Nik</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nik"
                                        id="nik">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"name="nama" id="nama">
                                </div>
                            </div>
                            <div class="mb-3
                                        row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                   <input type="text" name="jabatan" class="form-control" id="jabatan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-4 col-form-label">Nomor
                                    Hanphone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="hp" id="hp">
                                </div>
                            </div>
                            <div
                                class="mb-3
                                            row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat"
                                        name="alamat">
                                </div>
                            </div>
                            <div
                                class="mb-3
                                                row">
                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal
                                    Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tanggallahir"
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
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- akhir edit modal --}}

<script> 
    function editPegawai(datas){
        $('#formEdit').attr('action','/dashboard/pemerintah/'+datas.nik+'/update')
        $('#editdata #nik').val(datas.nik)
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
    const hapus = document.getElementById('hapus')
    hapus.addEventListener('click',(e)=>{
        const konfirmasi =confirm('yakin ingin menghapus data ??')
        if(konfirmasi==false){
            e.preventDefault()
        }
    })
</script>

    @endsection

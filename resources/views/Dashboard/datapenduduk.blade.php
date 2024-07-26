@extends('Dashboard.layout.main')
@section('container')
    <style>
        .fs-7 {
            font-size: 12px;
        }
    </style>
    <div class="container">
        @if (session('hapus'))
            <script>alert('{{session('hapus')}}');</script>
        @endif
        <h2 class="my-3 text-center fw-bold encode-condensed-bold text-bluedark text-uppercase fw-bold">Daftar Data Penduduk</h2>
        <a href="/dashboard/formpenduduk"><button class="btn btn-sm  btn-bluedark"><i class="bi bi-database-fill-add"></i></button></a>
        <form action="/dashboard/datapenduduk" method="get" class=" d-flex">
            <div class="input-group input-group-sm mb-3 w-50 m-auto ">
                <button class="btn btn-sm  btn-bluedark" type="submit">Cari</button>
                <input type="text" class="form-control" placeholder="Cari data Penduduk" name="filter">
            </div>
        </form>
        <a href="/dashboard/datapenduduk" class="btn btn-sm btn-bluedark position-relative end-0 {{(!request('filter')?'d-none':'')}}"><i class="bi bi-arrow-clockwise me-1 align-middle"></i> refresh</a>
        <table class="table ">
            <thead>
                <tr class="text-center">
                    <th scope="col">No </th>
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Dusun</th>
                    <th scope="col">-</th>
                </tr>
            </thead>
            <tbody>
                @if(session('sukses'))
                    <script>
                        alert("{{ session('sukses') }}");
                    </script>
                @endif
                @foreach ($penduduk as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->dusun }}</td>
                        <td class="d-flex">
                            <a id="data" onclick="dataPenduduk({{$item}})" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <button class="btn btn-primary btn-sm">
                                    <span class="bi bi-info"></span>
                                </button>
                            </a>
                            <a href="/dashboard/datapenduduk/{{ $item->nik }}/updatependuduk" class="mx-1">
                                <button type="button" class="btn btn-success btn-sm">
                                   <span class="bi bi-pencil-square"></span>
                                </button>
                            </a>
                           <form action="/dashboard/datapenduduk/{{$item->nik}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <span class="bi bi-trash"></span>
                                </button>
                           </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $penduduk->links() }}
        </div>
    </div>
    {{-- my modal view --}}
    <div class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-bluedark">
                    <h1 class="modal-title fs-5 text-bluelight" id="exampleModalLabel">Detail Data 
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">Nama </div>
                        <div class="col-8" id="nama"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Nik </div>
                        <div class="col-8" id="nik"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Jenis Kelamin </div>
                        <div class="col-8" id="jk"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Agama : </div>
                        <div class="col-8" id="agama"> </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Alamat </div>
                        <div class="col-8" id="alamat"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Tempat/tanggal lahir </div>
                        <div class="col-8" id="tempatlahir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Dusun </div>
                        <div class="col-8" id="dusun"> </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Email : </div>
                        <div class="col-8" id="email"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">No.handphone : </div>
                        <div class="col-8" id="hp">: </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Status : </div>
                        <div class="col-8" id="status"></div>
                    </div>
                    <div class="row">
                        <div class="col-4" >Pendidikan terakhir </div>
                        <div class="col-8" id="pendidikan">: </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Asal sekolah </div>
                        <div class="col-8" id='asalsekolah'> </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Pekerjaaan </div>
                        <div class="col-8" id="pekerjaan"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">Penghasilan </div>
                        <div class="col-8" id="penghasilan"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <Script>
        const dataPenduduk = (Penduduk) => {
            document.getElementById('exampleModalLabel').innerHTML = `detail Data ${Penduduk.nama}`
            document.getElementById('nama').innerHTML = `: ${Penduduk.nama}`
            document.getElementById('nik').innerHTML =`: ${Penduduk.nik}` 
            document.getElementById('jk').innerHTML = `: ${Penduduk.jk}`
            document.getElementById('agama').innerHTML =`: ${Penduduk.agama}` 
            document.getElementById('alamat').innerHTML =`: ${Penduduk.alamat}` 
            document.getElementById('tempatlahir').innerHTML =`: ${Penduduk.tempatlahir},${Penduduk.tanggallahir}`
            document.getElementById('dusun').innerHTML = `: ${Penduduk.dusun}`
            document.getElementById('email').innerHTML = `: ${Penduduk.email}`
            document.getElementById('hp').innerHTML = `: ${Penduduk.hp}`
            document.getElementById('status').innerHTML = `: ${Penduduk.status}`
            document.getElementById('pendidikan').innerHTML =`: ${Penduduk.pendidikan}`
            document.getElementById('asalsekolah').innerHTML = `: ${Penduduk.namasekolah}`
            document.getElementById('pekerjaan').innerHTML = `: ${Penduduk.pekerjaan}`
            document.getElementById('penghasilan').innerHTML =`: ${ Penduduk.penghasilan}`
        }

    </Script>
@endsection

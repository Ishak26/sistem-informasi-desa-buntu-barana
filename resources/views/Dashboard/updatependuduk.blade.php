@extends('Dashboard.layout.main')
@section('container')
    <style>
        @media screen and (min-width: 900px) {
            body {
                /* font-size: 12px; */
            }
        }

        @media screen and (max-width:600px) {
            body {
                font-size: 12px;
            }
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Post Form -->
    <div class="container">
        <form action="/dashboard/updatependuduk/{{$data->nik}}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <legend>Data Pribadi</legend>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault01" class="form-label">Nik</label>
                        <input type="number" class="form-control" id="validationDefault01" name="nik" required
                            value="{{ $data->nik }}" />
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault02" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="validationDefault02" name="nama" required
                            value="{{ $data->nama }}">
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefaultUsername" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="Email" name="email" class="form-control" id="validationDefaultUsername"
                                aria-describedby="inputGroupPrepend2" required value="{{ $data->email }}" />
                        </div>
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault03" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="validationDefault03" required
                            value="{{ $data->alamat }}" />
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault04" class="form-label">Dusun</label>
                        <select class="form-select" name="dusun" id="validationDefault04" required>
                            <option>--Pilih--</option>
                            <option {{ $data->dusun == 'dusun1' ? 'selected' : '' }} value="dusun1">dusun 1</option>
                            <option {{ $data->dusun == 'dusun2' ? 'selected' : '' }} value="dusun2">dusun 2</option>
                            <option {{ $data->dusun == 'dusun3' ? 'selected' : '' }} value="dusun3">dusun 3</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Agama</label>
                            <select name="agama" class="form-select" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option {{ $data->agama == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                                <option {{ $data->agama == 'kristen' ? 'selected' : '' }} value="kristen">Kristen</option>
                                <option {{ $data->agama == 'hindu' ? 'selected' : '' }} value="hindu">HIndu</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Status</label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option {{ $data->status == 'kawin' ? 'selected' : '' }} value="kawin">Kawin</option>
                                <option {{ $data->status == 'Belum kawin' ? 'selected' : '' }} value="Belum kawin">Belum
                                    Kawin
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Nomor Hp</label>
                            <input type="number" name="hp" class="form-control" id="validationDefault05" required
                                value="{{ $data->hp }}" />
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Umur</label>
                            <input type="number" name="umur" class="form-control" id="validationDefault05" required
                                value="{{ $data->umur }}" />
                        </div>
                    </div>
                    <div class="col-sm-12 my-3">
                        <label for="validationDefault05" class="form-label">Jenis Kelamin</label>
                        <div class="d-flex flex-row">
                            <div class="form-check mx-3">
                                <input class="form-check-input" type="radio" name="jk" value="laki-laki"
                                    id="flexRadioDefault1" {{ $data->jk == 'laki-laki' ? 'checked' : '' }} />
                                <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2 "
                                    value="perempuan" {{ $data->jk == 'perempuan' ? 'checked' : '' }} />
                                <label class="form-check-label" for="flexRadioDefault2"> Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="TempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="Text" class="form-control" name="tempatlahir" id="Tempatlahir" required
                                value="{{ $data->tempatlahir }}" />
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault01" class="form-label">Tanggal_Lahir</label>
                            <input type="Date" name="tanggallahir" class="form-control" id="validationDefault01"
                                required value="{{ $data->tanggallahir }}" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 ">
                    <div class="border p-2 border-box mt-4 rounded shadow">
                        <legend class="ms-3">Pendidikan</legend>
                        <div class="col-sm-8 mb-3 ms-3">
                            <label for="validationDefault01" class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan" class="form-select" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option value="SMP" {{ $data->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ $data->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ $data->pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ $data->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ $data->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3"{{ $data->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                        </div>
                        <div class="col-sm-8 ms-3 mb-3">
                            <label for="validationDefault01" class="form-label">Nama Sekolah</label>
                            <input name="namasekolah" type="text" class="form-control" id="validationDefault01"
                                required value="{{ $data->namasekolah }}" />
                        </div>
                    </div>
                    <div class="border p-2 border-box mt-4 rounded shadow d-flex flex-column justify-content-center">
                        <legend class="ms-3">Pekerjaan</legend>
                        <div class="col-sm-8 mb-3 ms-3">
                            <label for="validationDefault01" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan" class="form-select" aria-label="Default select example">
                                <option>--pilih--</option>
                                <option value="petani" {{ $data->pekerjaan == 'petani' ? 'selected' : '' }}>Petani
                                </option>
                                <option value="pns" {{ $data->pekerjaan == 'pns' ? 'selected' : '' }}>PNS</option>
                                <option value="pengusaha" {{ $data->pekerjaan == 'pengusaha' ? 'selected' : '' }}>
                                    Pengusaha
                                </option>
                                 <option value="Tidak bekerja" {{ $data->pekerjaan == 'Tidak bekerja' ? 'selected' : '' }}>
                                    Tidak bekerja
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-8 ms-3 mb-3">
                            <label for="validationDefault01" class="form-label">Penghasilan /bulan</label>
                            <input name="penghasilan" type="text" class="form-control" id="validationDefault01" required
                                value="{{ $data->penghasilan }}" />
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="d-block m-auto mt-3 btn btn-primary text-center">Update</button>
        </form>
    </div>
@endsection

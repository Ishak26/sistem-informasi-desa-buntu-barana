@extends('Dashboard.layout.main')
@section('container')
@include('dashboard.partials.sessionhandle')
    {{-- edit penduduk --}}
    <div class="container">
        <form action="/dashboard/updatependuduk/{{$data->nik}}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <legend>Data Pribadi</legend>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault01" class="form-label">Nik</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="validationDefault01" name="nik" required
                            value="{{ $data->nik }}" />
                        @error('nik')
                            <div class="invalid-fedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault02" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="validationDefault02" name="nama" required
                            value="{{ $data->nama }}">
                            @error('nama')
                            <div class="invalid-fedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefaultUsername" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="Email" name="email" class="form-control @error('email') is-invalid @enderror" id="validationDefaultUsername"
                                aria-describedby="inputGroupPrepend2" required value="{{ $data->email }}" />
                                @error('email')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault03" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="validationDefault03" required
                            value="{{ $data->alamat }}" />
                        @error('alamat')
                            <div class="invalid-fedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-auto mb-1">
                        <label for="validationDefault04" class="form-label">Dusun</label>
                        <select class="form-select @error('dusun') is-invalid @enderror" name="dusun" id="validationDefault04" required>
                            <option>--Pilih--</option>
                            <option {{ $data->dusun == 'DUSUN BUNTUN KALOSI' ? 'selected' : '' }} value="DUSUN BUNTUN KALOSI">DUSUN BUNTUN KALOSI</option>
                            <option {{ $data->dusun == 'DUSUN RANTE LIMBONG' ? 'selected' : '' }} value="DUSUN RANTE LIMBONG">DUSUN RANTE LIMBONG</option>
                            <option {{ $data->dusun == 'DUSUN BALABATU' ? 'selected' : '' }} value="DUSUN BALABATU ">DUSUN BALABATU </option>
                            <option {{ $data->dusun == 'DUSUN MALIBA' ? 'selected' : '' }} value="DUSUN MALIBA ">DUSUN MALIBA </option>
                        </select>
                        @error('dusun')
                            <div class="invalid-fedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Agama</label>
                            <select name="agama" class="form-select @error('agama') is-invalid @enderror" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option {{ $data->agama == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                                <option {{ $data->agama == 'kristen' ? 'selected' : '' }} value="kristen">Kristen</option>
                                <option {{ $data->agama == 'hindu' ? 'selected' : '' }} value="hindu">HIndu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option {{ $data->status == 'kawin' ? 'selected' : '' }} value="kawin">Kawin</option>
                                <option {{ $data->status == 'Belum kawin' ? 'selected' : '' }} value="Belum kawin">Belum
                                    Kawin
                                </option>
                            </select>
                            @error('status')
                            <div class="invalid-fedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Nomor Hp</label>
                            <input type="number" name="hp" class="form-control @error('hp') is-invalid @enderror" id="validationDefault05" required
                                value="{{ $data->hp }}" />
                            @error('hp')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault05" class="form-label">Umur</label>
                            <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror" id="validationDefault05" required
                                value="{{ $data->umur }}" />
                            @error('umur')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
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
                        @error('jk')
                            <div class="invalid-fedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <label for="TempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="Text" class="form-control @error('tempatlahir') is-invalid @enderror" name="tempatlahir" id="Tempatlahir" required
                                value="{{ $data->tempatlahir }}" />
                            @error('tempatlahir')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-1">
                            <label for="validationDefault01" class="form-label">Tanggal_Lahir</label>
                            <input type="Date" name="tanggallahir" class="form-control @error('tanggallahir') is-invalid @enderror" id="validationDefault01"
                                required value="{{ $data->tanggallahir }}" />
                             @error('tanggallahir')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 ">
                    <div class="border p-2 border-box mt-4 rounded shadow">
                        <legend class="ms-3">Pendidikan</legend>
                        <div class="col-sm-8 mb-3 ms-3">
                            <label for="validationDefault01" class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan" class="form-select @error('pendidikan') is-invalid @enderror" aria-label="Default select example">
                                <option>--Pilih--</option>
                                <option value="SMP" {{ $data->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ $data->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ $data->pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ $data->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ $data->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3"{{ $data->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-8 ms-3 mb-3">
                            <label for="validationDefault01" class="form-label">Nama Sekolah</label>
                            <input name="namasekolah" type="text" class="form-control @error('namasekolah') is-invalid @enderror" id="validationDefault01"
                                required value="{{ $data->namasekolah }}" />
                            @error('namasekolah')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="border p-2 border-box mt-4 rounded shadow d-flex flex-column justify-content-center">
                        <legend class="ms-3">Pekerjaan</legend>
                        <div class="col-sm-8 mb-3 ms-3">
                            <label for="validationDefault01" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan" class="form-select @error('pekerjaan') is-invalid  @enderror" aria-label="Default select example">
                                <option>--pilih--</option>
                                <option value="petani" {{ $data->pekerjaan == 'petani' ? 'selected' : '' }}>Petani
                                </option>
                                <option value="pns" {{ $data->pekerjaan == 'pns' ? 'selected' : '' }}>PNS</option>
                                <option value="pengusaha" {{ $data->pekerjaan == 'pengusaha' ? 'selected' : '' }}>
                                    Pengusaha
                                </option>
                                <option value="Peternak" {{ $data->pekerjaan == 'Peternak' ? 'selected' : '' }}>
                                    Peternak
                                </option>
                                <option value="Pedagang" {{ $data->pekerjaan == 'Pedagang' ? 'selected' : '' }}>
                                    Pedagang
                                </option>
                                <option value="Belum bekerja" {{ $data->pekerjaan == 'Belum bekerja' ? 'selected' : '' }}>
                                    Belum bekerja
                                </option>
                            </select>
                            @error('pekerjaan')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-8 ms-3 mb-3">
                            <label for="validationDefault01" class="form-label">Penghasilan /bulan</label>
                            <input name="penghasilan" type="text" class="form-control @error('penghasilan') is-invalid @enderror" id="validationDefault01" required
                                value="{{ $data->penghasilan }}" />
                            @error('penghasilan')
                                <div class="invalid-fedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="d-block m-auto mt-3 btn btn-primary text-center">Update</button>
        </form>
    </div>
@endsection
